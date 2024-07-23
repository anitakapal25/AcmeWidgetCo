<?php

class Offer {
    public $productCode;
    public $type;

    public function __construct($productCode, $type) {
        $this->productCode = $productCode;
        $this->type = $type;
    }

    public function apply($count, $price) {
        if ($this->type === 'buy_one_get_second_half_price') {
            return ($price * floor($count / 2) * 1.5) + ($price * ($count % 2));
        }
        return $price * $count;
    }
}
?>
