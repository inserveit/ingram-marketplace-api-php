<?php

namespace Inserve\IngramMarketplaceAPI\Models;

/**
 *
 */
class AbstractPaginationResponse
{
    protected ?Pagination $pagination = null;

    /**
     * @return Pagination|null
     */
    public function getPagination(): ?Pagination
    {
        return $this->pagination;
    }

    /**
     * @param Pagination|null $pagination
     *
     * @return self
     */
    public function setPagination(?Pagination $pagination): self
    {
        $this->pagination = $pagination;

        return $this;
    }
}
