<?php

namespace Inserve\IngramMarketplaceAPI\API;

use Inserve\IngramMarketplaceAPI\Exception\IngramMarketplaceAPIException;
use Inserve\IngramMarketplaceAPI\Models\Customer;
use Inserve\IngramMarketplaceAPI\Models\PaginatedCustomerResponse;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

/**
 *
 */
class CustomerAPI extends AbstractAPIClient
{
    /**
     * @param string $customerId
     *
     * @return Customer|null
     *
     * @throws ExceptionInterface
     * @throws IngramMarketplaceAPIException
     */
    public function get(string $customerId): ?Customer
    {
        $response = $this->apiClient->call('GET', sprintf('customers/%s', $customerId));

        /** @var Customer|null */
        return $this->apiClient->denormalize($response, Customer::class);
    }

    /**
     * @param int   $offset
     * @param int   $limit
     * @param array<string,string> $parameters
     *
     * @return PaginatedCustomerResponse|null
     *
     * @throws IngramMarketplaceAPIException
     * @throws ExceptionInterface
     */
    public function list(int $offset = 0, int $limit = 200, array $parameters = []): ?PaginatedCustomerResponse
    {
        $url = sprintf(
            'customers?%s',
            http_build_query(array_merge(['offset' => $offset, 'limit' => $limit], $parameters))
        );

        $response = $this->apiClient->call('GET', $url);

        /** @var PaginatedCustomerResponse|null */
        return $this->apiClient->denormalize($response, PaginatedCustomerResponse::class);
    }
}
