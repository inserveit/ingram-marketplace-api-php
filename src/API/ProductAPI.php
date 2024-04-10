<?php

namespace Inserve\IngramMarketplaceAPI\API;

use Inserve\IngramMarketplaceAPI\Exception\IngramMarketplaceAPIException;
use Inserve\IngramMarketplaceAPI\Models\PaginatedProductResponse;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

/**
 *
 */
class ProductAPI extends AbstractAPIClient
{
    /**
     * @param int   $offset
     * @param int   $limit
     * @param array<string,string> $parameters
     *
     * @return PaginatedProductResponse|null
     *
     * @throws IngramMarketplaceAPIException
     * @throws ExceptionInterface
     */
    public function list(int $offset = 0, int $limit = 50, array $parameters = []): ?PaginatedProductResponse
    {
        $url = sprintf(
            'products?%s',
            http_build_query(array_merge(['offset' => $offset, 'limit' => $limit], $parameters))
        );

        $response = $this->apiClient->call('GET', $url);

        /** @var PaginatedProductResponse|null */
        return $this->apiClient->denormalize($response, PaginatedProductResponse::class);
    }
}
