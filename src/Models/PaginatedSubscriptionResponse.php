<?php

namespace Inserve\IngramMarketplaceAPI\Models;

/**
 *
 */
final class PaginatedSubscriptionResponse extends AbstractPaginationResponse
{
    /** @var Subscription[]|null */
    protected ?array $data = [];

    /**
     * @return Subscription[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Subscription[]|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }
}
