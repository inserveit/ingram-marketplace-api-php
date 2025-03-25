<?php

namespace Inserve\IngramMarketplaceAPI;

use GuzzleHttp\Client;
use Inserve\IngramMarketplaceAPI\API\CustomerAPI;
use Inserve\IngramMarketplaceAPI\API\ProductAPI;
use Inserve\IngramMarketplaceAPI\API\SubscriptionAPI;
use Inserve\IngramMarketplaceAPI\Client\APIClient;
use Inserve\IngramMarketplaceAPI\Exception\IngramMarketplaceAPIException;
use Psr\Log\LoggerInterface;
use SensitiveParameter;

/**
 * @property CustomerAPI     $customer
 * @property ProductAPI      $product
 * @property SubscriptionAPI $subscription
 */
class IngramMarketplaceAPIClient
{
    protected APIClient $apiClient;

    /**
     * @param APIClient|null       $apiClient
     * @param LoggerInterface|null $logger
     * @param string|null          $baseUri
     */
    public function __construct(?APIClient $apiClient = null, ?LoggerInterface $logger = null, ?string $baseUri = null)
    {
        if (! $apiClient) {
            $apiClient = new APIClient(
                new Client(['base_uri' => $baseUri ?? 'https://api.cloud.im'])
            );
        }

        if ($logger) {
            $apiClient->setLogger($logger);
        }

        $this->apiClient = $apiClient;
    }

    /**
     * @param string        $name
     * @param array<string> $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments): mixed
    {
        return $this->__get($name);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        $fqdnClass = sprintf('%s\\API\\%sAPI', __NAMESPACE__, ucfirst($name));

        if (class_exists($fqdnClass)) {
            return new $fqdnClass($this->apiClient);
        }

        return null;
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $subscriptionKey
     * @param string $marketPlace
     *
     * @return string|null
     *
     * @throws IngramMarketplaceAPIException
     */
    public function authenticate(
        string $username,
        #[SensitiveParameter] string $password,
        string $subscriptionKey,
        string $marketPlace = 'eu'
    ): ?string {
        $headers = [
            'Authorization' => sprintf(
                'Basic %s',
                base64_encode(
                    sprintf('%s:%s', $username, $password)
                )
            ),
        ];

        $this->setSubscriptionKey($subscriptionKey);
        $bearerToken = $this->apiClient->call(
            'POST',
            'token',
            $headers,
            (string) json_encode(['marketplace' => $marketPlace])
        );

        if (! is_array($bearerToken) || ! array_key_exists('token', $bearerToken)) {
            return null;
        }

        /** @var string $token */
        $token = $bearerToken['token'];
        $this->setBearerToken($token);

        return $token;
    }

    /**
     * @param string $subscriptionKey
     *
     * @return void
     */
    public function setSubscriptionKey(string $subscriptionKey): void
    {
        $this->apiClient->setSubscriptionKey($subscriptionKey);
    }

    /**
     * @param string $bearerToken
     *
     * @return void
     */
    public function setBearerToken(string $bearerToken): void
    {
        $this->apiClient->setBearerToken($bearerToken);
    }
}
