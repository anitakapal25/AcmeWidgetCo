<?php

namespace Acme\Interfaces;

interface DeliveryChargeInterface {
    public function getCharge(float $total): float;
}