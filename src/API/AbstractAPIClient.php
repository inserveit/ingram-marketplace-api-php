<?php

namespace Inserve\IngramMarketplaceAPI\API;

use Inserve\IngramMarketplaceAPI\Client\APIClient;

/**
 *
 */
abstract class AbstractAPIClient
{
    /**
     * @param APIClient $apiClient
     */
    public function __construct(protected APIClient $apiClient)
    {
    }
}
