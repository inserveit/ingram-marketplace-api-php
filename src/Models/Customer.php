<?php

namespace Inserve\IngramMarketplaceAPI\Models;

/**
 *
 */
class Customer
{
    protected ?string $id = null;
    protected ?string $externalId = null;
    protected ?string $status = null;
    protected ?string $name = null;
    protected ?string $language = null;
    protected ?string $taxRegId = null;
    protected ?string $resellerId = null;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return Customer
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param string|null $externalId
     *
     * @return Customer
     */
    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     *
     * @return Customer
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return Customer
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     *
     * @return Customer
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxRegId(): ?string
    {
        return $this->taxRegId;
    }

    /**
     * @param string|null $taxRegId
     *
     * @return Customer
     */
    public function setTaxRegId(?string $taxRegId): self
    {
        $this->taxRegId = $taxRegId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getResellerId(): ?string
    {
        return $this->resellerId;
    }

    /**
     * @param string|null $resellerId
     *
     * @return Customer
     */
    public function setResellerId(?string $resellerId): self
    {
        $this->resellerId = $resellerId;

        return $this;
    }
}
