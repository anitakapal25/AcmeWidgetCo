<?php

namespace Acme;

use Acme\Interfaces\DeliveryChargeInterface;

class DeliveryCharge implements DeliveryChargeInterface {
    private array $rules;

    public function __construct(array $rules) {
        $this->rules = $rules;
    }

    public function getCharge(float $total): float {
        if ($total < 50) {
            return $this->rules['under_50'];
        } elseif ($total < 90) {
            return $this->rules['under_90'];
        }
        return $this->rules['over_90'];
    }
}