<?php

namespace Dpd\Business;

/** Bundles shipment response data. */
class ShipmentResponse
{
    /**
     * Serves as unique alphanumeric key of the shipment used by customer.
     * @var string
     */
    protected string $identificationNumber;

    /**
     * The shipment number for consignment data. If ordertype is pickup information,
     * the shipment number is an internal database id, which is necessary for technical support requests at DPD.
     * @var string
     */
    protected string $mpsId;

    /**
     * Contains information about the single parcels.
     * @var ParcelInformationType
     */
    protected $parcelInformation;

    /**
     * Contains information about errors during shipment order processing.
     * @var FaultCodeType|FaultCodeType[]
     */
    protected $faults;

    /**
     * @return string|null
     */
    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber ?? null;
    }

    /**
     * @return string|null
     */
    public function getMpsId(): ?string
    {
        return $this->mpsId ?? null;
    }

    /**
     * @return ParcelInformationType[]|ParcelInformationType|null
     */
    public function getParcelInformation()
    {
        return $this->parcelInformation ?? null;
    }

    /**
     * @return FaultCodeType[]
     */
    public function getFaults(): array
    {
        if (is_null($this->faults)) return [];
        if ($this->faults instanceof FaultCodeType) return [$this->faults];
        if (is_array($this->faults)) return $this->faults;
        return [];
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->getFaults() instanceof FaultCodeType || is_array($this->getFaults());
    }
}