<?php

namespace Acme;

use Acme\Interfaces\OfferInterface;

class Offer implements OfferInterface {
    private string $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function apply(int $count, float $price): float {
        if ($this->type === 'buy_one_get_second_half_price') {
            return ($price * floor($count / 2) * 1.5) + ($price * ($count % 2));
        }
        return $price * $count;
    }
}