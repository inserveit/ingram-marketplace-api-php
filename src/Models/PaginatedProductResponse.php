<?php

namespace Inserve\IngramMarketplaceAPI\Models;

/**
 *
 */
class PaginatedProductResponse extends AbstractPaginationResponse
{
    /** @var Product[]|null */
    protected ?array $data = [];

    /**
     * @return Product[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Product[]|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }
}
