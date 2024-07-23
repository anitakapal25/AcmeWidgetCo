<?php

class DeliveryCharge {
    private $rules;

    public function __construct($rules) {
        $this->rules = $rules;
    }

    public function getCharge($total) {
        if ($total < 50) {
            return $this->rules['under_50'];
        } elseif ($total < 90) {
            return $this->rules['under_90'];
        }
        return $this->rules['over_90'];
    }
}
?>
