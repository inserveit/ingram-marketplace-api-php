<?php

namespace Inserve\IngramMarketplaceAPI;

use GuzzleHttp\Client;
use Inserve\IngramMarketplaceAPI\Client\APIClient;
use Inserve\IngramMarketplaceAPI\Exception\IngramMarketplaceAPIException;
use SensitiveParameter;

/**
 */
class IngramMarketplaceAPIClient
{
    protected APIClient $apiClient;

    /**
     * @param APIClient|null $apiClient
     */
    public function __construct(?APIClient $apiClient = null)
    {
        if (! $apiClient) {
            $apiClient = new APIClient(
                new Client(['base_uri' => 'https://api.cloud.im/marketplace/eu'])
            );
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

        $this->apiClient->setSubscriptionKey($subscriptionKey);
        $bearerToken = $this->apiClient->call(
            'POST',
            '/token',
            $headers,
            (string) json_encode(['marketplace' => $marketPlace])
        );

        if (! is_array($bearerToken) || ! array_key_exists('token', $bearerToken)) {
            return null;
        }

        $bearerToken = $bearerToken['token'];
        $this->apiClient->setBearerToken($bearerToken);

        return $bearerToken;
    }
}
