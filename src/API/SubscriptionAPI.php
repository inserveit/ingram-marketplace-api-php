<?php

namespace Inserve\IngramMarketplaceAPI\API;

use Inserve\IngramMarketplaceAPI\Exception\IngramMarketplaceAPIException;
use Inserve\IngramMarketplaceAPI\Models\PaginatedSubscriptionResponse;
use Inserve\IngramMarketplaceAPI\Models\Subscription;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

/**
 *
 */
class SubscriptionAPI extends AbstractAPIClient
{
    /**
     * @param string $subscriptionId
     *
     * @return Subscription|null
     *
     * @throws ExceptionInterface
     * @throws IngramMarketplaceAPIException
     */
    public function get(string $subscriptionId): ?Subscription
    {
        $response = $this->apiClient->call('GET', sprintf('subscriptions/%s', $subscriptionId));

        /** @var Subscription|null */
        return $this->apiClient->denormalize($response, Subscription::class);
    }

    /**
     * @param int   $offset
     * @param int   $limit
     * @param array<string,string> $parameters
     *
     * @return PaginatedSubscriptionResponse|null
     *
     * @throws IngramMarketplaceAPIException
     * @throws ExceptionInterface
     */
    public function list(int $offset = 0, int $limit = 50, array $parameters = []): ?PaginatedSubscriptionResponse
    {
        $url = sprintf(
            'subscriptions?%s',
            http_build_query(array_merge(['offset' => $offset, 'limit' => $limit], $parameters))
        );

        $response = $this->apiClient->call('GET', $url);

        /** @var PaginatedSubscriptionResponse|null */
        return $this->apiClient->denormalize($response, PaginatedSubscriptionResponse::class);
    }
}
