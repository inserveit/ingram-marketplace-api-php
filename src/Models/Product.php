<?php

namespace Inserve\IngramMarketplaceAPI\Models;

/**
 *
 */
class Product
{
    protected ?string $mpn = null;
    protected ?string $vendor = null;
    protected ?string $id = null;
    protected ?string $serviceName = null;
    protected ?string $name = null;
    protected ?int $quantity = null;
    protected ?string $minimumQuantity = null;
    protected ?string $maximumQuantity = null;
    /** @var Price[]|null */
    protected ?array $prices = null;
    /** @var Price[]|null */
    protected ?array $costs = null;
    protected ?Price $unitPrice = null;
    protected ?Price $unitCost = null;
    protected ?Period $billingPeriod = null;
    protected ?Period $subscriptionPeriod = null;
    protected ?string $billingModel = null;

    /**
     * @return string|null
     */
    public function getMpn(): ?string
    {
        return $this->mpn;
    }

    /**
     * @return string|null
     */
    public function getVendor(): ?string
    {
        return $this->vendor;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getServiceName(): ?string
    {
        return $this->serviceName;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @return string|null
     */
    public function getMinimumQuantity(): ?string
    {
        return $this->minimumQuantity;
    }

    /**
     * @return string|null
     */
    public function getMaximumQuantity(): ?string
    {
        return $this->maximumQuantity;
    }

    /**
     * @return Price[]|null
     */
    public function getPrices(): ?array
    {
        return $this->prices;
    }

    /**
     * @return Price[]|null
     */
    public function getCosts(): ?array
    {
        return $this->costs;
    }

    /**
     * @return Price|null
     */
    public function getUnitPrice(): ?Price
    {
        return $this->unitPrice;
    }

    /**
     * @return Price|null
     */
    public function getUnitCost(): ?Price
    {
        return $this->unitCost;
    }

    /**
     * @return Period|null
     */
    public function getBillingPeriod(): ?Period
    {
        return $this->billingPeriod;
    }

    /**
     * @return Period|null
     */
    public function getSubscriptionPeriod(): ?Period
    {
        return $this->subscriptionPeriod;
    }

    /**
     * @return string|null
     */
    public function getBillingModel(): ?string
    {
        return $this->billingModel;
    }

    /**
     * @param string|null $mpn
     *
     * @return self
     */
    public function setMpn(?string $mpn): self
    {
        $this->mpn = $mpn;

        return $this;
    }

    /**
     * @param string|null $vendor
     *
     * @return self
     */
    public function setVendor(?string $vendor): self
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string|null $serviceName
     *
     * @return self
     */
    public function setServiceName(?string $serviceName): self
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param int|null $quantity
     *
     * @return self
     */
    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param string|null $minimumQuantity
     *
     * @return self
     */
    public function setMinimumQuantity(?string $minimumQuantity): self
    {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @param string|null $maximumQuantity
     *
     * @return self
     */
    public function setMaximumQuantity(?string $maximumQuantity): self
    {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @param Price[]|null $prices
     *
     * @return self
     */
    public function setPrices(?array $prices): self
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @param Price[]|null $costs
     *
     * @return self
     */
    public function setCosts(?array $costs): self
    {
        $this->costs = $costs;

        return $this;
    }

    /**
     * @param Price|null $unitPrice
     *
     * @return self
     */
    public function setUnitPrice(?Price $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @param Price|null $unitCost
     *
     * @return self
     */
    public function setUnitCost(?Price $unitCost): self
    {
        $this->unitCost = $unitCost;

        return $this;
    }

    /**
     * @param Period|null $billingPeriod
     *
     * @return self
     */
    public function setBillingPeriod(?Period $billingPeriod): self
    {
        $this->billingPeriod = $billingPeriod;

        return $this;
    }

    /**
     * @param Period|null $subscriptionPeriod
     *
     * @return self
     */
    public function setSubscriptionPeriod(?Period $subscriptionPeriod): self
    {
        $this->subscriptionPeriod = $subscriptionPeriod;

        return $this;
    }

    /**
     * @param string|null $billingModel
     *
     * @return self
     */
    public function setBillingModel(?string $billingModel): self
    {
        $this->billingModel = $billingModel;

        return $this;
    }
}
