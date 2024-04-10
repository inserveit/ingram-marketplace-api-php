<?php

namespace Inserve\IngramMarketplaceAPI\Models;

/**
 *
 */
class PaginatedCustomerResponse extends AbstractPaginationResponse
{
    /** @var Customer[]|null */
    protected ?array $data = [];

    /**
     * @return Customer[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Customer[]|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }
}
