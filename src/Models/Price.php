<?php

namespace Inserve\IngramMarketplaceAPI\Models;

/**
 *
 */
final class Price
{
    protected ?string $currency = null;
    protected ?string $amount = null;
    protected ?string $type = null;
    protected ?string $model = null;
    protected int|float|null $lowerLimit = null;

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @return float|int|null
     */
    public function getLowerLimit(): float|int|null
    {
        return $this->lowerLimit;
    }

    /**
     * @param string|null $currency
     *
     * @return self
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string|null $amount
     *
     * @return self
     */
    public function setAmount(?string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string|null $model
     *
     * @return self
     */
    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @param float|int|null $lowerLimit
     *
     * @return self
     */
    public function setLowerLimit(float|int|null $lowerLimit): self
    {
        $this->lowerLimit = $lowerLimit;

        return $this;
    }
}
