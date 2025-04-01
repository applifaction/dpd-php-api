<?php

namespace Dpd\Business;

/** Bundles storeOrders response data. */
class StoreOrdersResponseType
{
    /**
     * Contains parcel label data in bytes.
     * @var OutputType
     */
    protected OutputType $output;

    /**
     * Contains response data for every shipment order.
     * @var ShipmentResponse[]|ShipmentResponse
     */
    protected mixed $shipmentResponses;

    /**
     * @return OutputType|null
     */
    public function getOutput(): ?OutputType
    {
        return $this->output ?? null;
    }

    /**
     * @return ShipmentResponse[]
     */
    public function getShipmentResponses(): array
    {
        return
            isset($this->shipmentResponses)
                ? (is_array($this->shipmentResponses) ? $this->shipmentResponses : [$this->shipmentResponses])
                : [];
    }
}