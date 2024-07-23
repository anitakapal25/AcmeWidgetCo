<?php

namespace Acme\Interfaces;

interface OfferInterface {
    public function apply(int $count, float $price): float;
}