<?php

namespace Acme;

use Acme\Interfaces\OfferInterface;
use Acme\Interfaces\DeliveryChargeInterface;

class Basket {
    private array $products;
    private array $offers;
    private DeliveryChargeInterface $deliveryCharge;
    private array $items = [];

    public function __construct(array $products, array $offers, DeliveryChargeInterface $deliveryCharge) {
        $this->products = $products;
        $this->offers = $offers;
        $this->deliveryCharge = $deliveryCharge;
    }

    public function add(string $productCode) {
        if (isset($this->products[$productCode])) {
            $this->items[] = $productCode;
        } else {
            throw new \Exception("Invalid product code: $productCode");
        }
    }

    public function total(): float {
        $total = 0;
        $itemCounts = array_count_values($this->items);

        foreach ($itemCounts as $productCode => $count) {
            $product = $this->products[$productCode];
            $price = $product->getPrice();
            if (isset($this->offers[$productCode])) {
                $total += $this->offers[$productCode]->apply($count, $price);
            } else {
                $total += $price * $count;
            }
        }

        $total += $this->deliveryCharge->getCharge($total);

        return number_format($total, 2, '.', '');
    }
}