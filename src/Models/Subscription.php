<?php

namespace Inserve\IngramMarketplaceAPI\Models;

/**
 *
 */
class Subscription
{
    protected ?string $id = null;
    protected ?string $name = null;
    protected ?string $customerId = null;
    protected ?string $status = null;

    /** @var array<string, string>|null */
    protected ?array $attributes = null;
    protected ?bool $renewalStatus = null;
    protected ?string $creationDate = null;
    protected ?string $renewalDate = null;
    protected ?string $lastModifiedDate = null;
    protected ?string $expirationDate = null;
    protected ?string $billingModel = null;
    protected ?Period $billingPeriod = null;
    protected ?Period $subscriptionPeriod = null;
    protected ?Price $totalPrice = null;
    protected ?Price $totalSubscriptionPrice = null;
    protected ?Price $totalSubscriptionCost = null;
    protected ?Price $totalSubscriptionProviderCost = null;
    /** @var Product[]|null */
    protected ?array $products = null;
    protected ?int $planId = null;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return array<string, string>|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @return bool|null
     */
    public function getRenewalStatus(): ?bool
    {
        return $this->renewalStatus;
    }

    /**
     * @return string|null
     */
    public function getCreationDate(): ?string
    {
        return $this->creationDate;
    }

    /**
     * @return string|null
     */
    public function getRenewalDate(): ?string
    {
        return $this->renewalDate;
    }

    /**
     * @return string|null
     */
    public function getLastModifiedDate(): ?string
    {
        return $this->lastModifiedDate;
    }

    /**
     * @return string|null
     */
    public function getExpirationDate(): ?string
    {
        return $this->expirationDate;
    }

    /**
     * @return string|null
     */
    public function getBillingModel(): ?string
    {
        return $this->billingModel;
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
     * @return Price|null
     */
    public function getTotalPrice(): ?Price
    {
        return $this->totalPrice;
    }

    /**
     * @return Price|null
     */
    public function getTotalSubscriptionPrice(): ?Price
    {
        return $this->totalSubscriptionPrice;
    }

    /**
     * @return Price|null
     */
    public function getTotalSubscriptionCost(): ?Price
    {
        return $this->totalSubscriptionCost;
    }

    /**
     * @return Price|null
     */
    public function getTotalSubscriptionProviderCost(): ?Price
    {
        return $this->totalSubscriptionProviderCost;
    }

    /**
     * @return Product[]|null
     */
    public function getProducts(): ?array
    {
        return $this->products;
    }

    /**
     * @return int|null
     */
    public function getPlanId(): ?int
    {
        return $this->planId;
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
     * @param string|null $customerId
     *
     * @return self
     */
    public function setCustomerId(?string $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param array<string, string>|null $attributes
     *
     * @return self
     */
    public function setAttributes(?array $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @param bool|null $renewalStatus
     *
     * @return self
     */
    public function setRenewalStatus(?bool $renewalStatus): self
    {
        $this->renewalStatus = $renewalStatus;

        return $this;
    }

    /**
     * @param string|null $creationDate
     *
     * @return self
     */
    public function setCreationDate(?string $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @param string|null $renewalDate
     *
     * @return self
     */
    public function setRenewalDate(?string $renewalDate): self
    {
        $this->renewalDate = $renewalDate;

        return $this;
    }

    /**
     * @param string|null $lastModifiedDate
     *
     * @return self
     */
    public function setLastModifiedDate(?string $lastModifiedDate): self
    {
        $this->lastModifiedDate = $lastModifiedDate;

        return $this;
    }

    /**
     * @param string|null $expirationDate
     *
     * @return self
     */
    public function setExpirationDate(?string $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

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
     * @param Price|null $totalPrice
     *
     * @return self
     */
    public function setTotalPrice(?Price $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * @param Price|null $totalSubscriptionPrice
     *
     * @return self
     */
    public function setTotalSubscriptionPrice(?Price $totalSubscriptionPrice): self
    {
        $this->totalSubscriptionPrice = $totalSubscriptionPrice;

        return $this;
    }

    /**
     * @param Price|null $totalSubscriptionCost
     *
     * @return self
     */
    public function setTotalSubscriptionCost(?Price $totalSubscriptionCost): self
    {
        $this->totalSubscriptionCost = $totalSubscriptionCost;

        return $this;
    }

    /**
     * @param Price|null $totalSubscriptionProviderCost
     *
     * @return self
     */
    public function setTotalSubscriptionProviderCost(?Price $totalSubscriptionProviderCost): self
    {
        $this->totalSubscriptionProviderCost = $totalSubscriptionProviderCost;

        return $this;
    }

    /**
     * @param Product[]|null $products
     *
     * @return self
     */
    public function setProducts(?array $products): self
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @param int|null $planId
     *
     * @return self
     */
    public function setPlanId(?int $planId): self
    {
        $this->planId = $planId;

        return $this;
    }
}
