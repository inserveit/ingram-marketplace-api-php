<?php

namespace Inserve\IngramMarketplaceAPI\Client;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Inserve\IngramMarketplaceAPI\Exception\IngramMarketplaceAPIException;
use Inserve\IngramMarketplaceAPI\Models\ErrorResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 *
 */
class APIClient
{
    protected ?string $bearerToken = null;
    protected ?string $subscriptionKey = null;

    protected Serializer $serializer;
    protected ObjectNormalizer $normalizer;

    /**
     * @param ClientInterface      $client
     * @param LoggerInterface|null $logger
     */
    public function __construct(protected ClientInterface $client, protected ?LoggerInterface $logger = null)
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $nameConverter =  new MetadataAwareNameConverter(
            $classMetadataFactory,
            new CamelCaseToSnakeCaseNameConverter()
        );

        $extractor = new PropertyInfoExtractor(
            typeExtractors: [
                new PhpDocExtractor(),
            ]
        );
        $this->normalizer = new ObjectNormalizer(
            classMetadataFactory: $classMetadataFactory,
            nameConverter: $nameConverter,
            propertyTypeExtractor: $extractor,
            defaultContext: [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]
        );

        $this->serializer = new Serializer(
            [$this->normalizer, new ArrayDenormalizer()],
            [new JsonEncoder()]
        );
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @param string $bearerToken
     *
     * @return void
     */
    public function setBearerToken(#[\SensitiveParameter] string $bearerToken): void
    {
        $this->bearerToken = $bearerToken;
    }

    /**
     * @param string $subscriptionKey
     *
     * @return void
     */
    public function setSubscriptionKey(string $subscriptionKey): void
    {
        $this->subscriptionKey = $subscriptionKey;
    }

    /**
     * @return string|null
     */
    public function getBearerToken(): ?string
    {
        return $this->bearerToken;
    }

    /**
     * @param mixed  $response
     * @param string $class
     *
     * @return mixed
     *
     * @throws ExceptionInterface
     */
    public function denormalize(mixed $response, string $class): mixed
    {
        try {
            return $this->normalizer->denormalize($response, $class);
        } catch (Exception $exception) {
            $this->logError(sprintf('(%s): %s', __FUNCTION__, $exception->getMessage()));

            return null;
        }
    }

    /**
     * @param string                $method
     * @param string                $url
     * @param array<string, string> $headers
     * @param string|null           $body
     *
     * @return mixed
     *
     * @throws IngramMarketplaceAPIException
     */
    public function call(string $method, string $url, array $headers = [], ?string $body = null): mixed
    {
        try {
            $request = new Request(
                $method,
                $this->getApiUrl($url),
                array_merge($headers, $this->getDefaultHeaders()),
                $body
            );
            $response = $this->client->send($request);

            return json_decode((string) $response->getBody(), true);
        } catch (GuzzleException|BadResponseException $exception) {
            $errorResponse = null;
            $errorMessage = $exception->getMessage();

            if ($exception instanceof RequestException) {
                $errorResponse = $this->serializer->deserialize(
                    (string) $exception->getResponse()?->getBody(),
                    ErrorResponse::class,
                    'json'
                );
                $errorMessage = (string) $errorResponse->getError();
            }

            $this->logError($errorMessage);

            throw new IngramMarketplaceAPIException(
                sprintf('%s: %s', $url, $errorMessage),
                $exception->getCode(),
                $errorResponse
            );
        }
    }

    /**
     * @param string $url
     *
     * @return string
     */
    protected function getApiUrl(string $url): string
    {
        return sprintf('/marketplace/eu/%s', $url);
    }

    /**
     * @return string[]
     */
    protected function getDefaultHeaders(): array
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        if ($this->bearerToken !== null) {
            $headers['Authorization'] = sprintf('Bearer %s', $this->bearerToken);
        }

        if ($this->subscriptionKey !== null) {
            $headers['X-Subscription-Key'] = $this->subscriptionKey;
        }

        return $headers;
    }

    /**
     * @param string $message
     *
     * @return void
     */
    private function logError(string $message): void
    {
        if (!$this->logger) {
            return;
        }

        $this->logger->error($message);
    }
}
