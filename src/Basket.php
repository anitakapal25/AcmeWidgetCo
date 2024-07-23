<?php

require_once 'Product.php';
require_once 'Offer.php';
require_once 'DeliveryCharge.php';

class Basket {
    private $products;
    private $offers;
    private $deliveryCharge;
    private $items = [];

    public function __construct($products, $offers, $deliveryCharge) {
        $this->products = $products;
        $this->offers = $offers;
        $this->deliveryCharge = $deliveryCharge;
    }

    public function add($productCode) {
        if (isset($this->products[$productCode])) {
            $this->items[] = $productCode;
        } else {
            throw new Exception("Invalid product code: $productCode");
        }
    }

    public function total() {
        $total = 0;
        $itemCounts = array_count_values($this->items);

        // Calculate the cost of items considering offers
        foreach ($itemCounts as $productCode => $count) {
            $price = $this->products[$productCode]->price;
            if (isset($this->offers[$productCode])) {
                $total += $this->offers[$productCode]->apply($count, $price);
            } else {
                $total += $price * $count;
            }
        }

        // Add delivery charges
        $total += $this->deliveryCharge->getCharge($total);

        return number_format($total, 2);
    }
}
?>
