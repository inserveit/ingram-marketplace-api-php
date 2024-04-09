<?php

namespace Inserve\IngramMarketplaceAPI\Exception;

use Exception;
use Inserve\IngramMarketplaceAPI\Models\ErrorResponse;

/**
 *
 */
class IngramMarketplaceAPIException extends Exception
{
    /**
     * @param string             $message
     * @param int                $code
     * @param ErrorResponse|null $errorResponse
     */
    public function __construct(string $message = '', int $code = 0, protected ?ErrorResponse $errorResponse = null)
    {
        parent::__construct($message, $code);
    }

    /**
     * @return ErrorResponse|null
     */
    public function getErrorResponse(): ?ErrorResponse
    {
        return $this->errorResponse;
    }
}
