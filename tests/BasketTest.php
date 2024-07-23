<?php

use PHPUnit\Framework\TestCase;
use Acme\Basket;
use Acme\Product;
use Acme\Offer;
use Acme\DeliveryCharge;

class BasketTest extends TestCase {
    private array $products;
    private array $offers;
    private DeliveryCharge $deliveryCharge;

    protected function setUp(): void {
        $this->products = [
            'R01' => new Product('R01', 'Red Widget', 32.95),
            'G01' => new Product('G01', 'Green Widget', 24.95),
            'B01' => new Product('B01', 'Blue Widget', 7.95)
        ];

        $this->offers = [
            'R01' => new Offer('buy_one_get_second_half_price')
        ];

        $deliveryRules = [
            'under_50' => 4.95,
            'under_90' => 2.95,
            'over_90' => 0.00
        ];

        $this->deliveryCharge = new DeliveryCharge($deliveryRules);
    }

    public function testTotalWithSimpleProducts() {
        $basket = new Basket($this->products, $this->offers, $this->deliveryCharge);
        $basket->add('B01');
        $basket->add('G01');

        $this->assertEquals(37.85, $basket->total());
    }

    public function testTotalWithSpecialOffer() {
        $basket = new Basket($this->products, $this->offers, $this->deliveryCharge);
        $basket->add('R01');
        $basket->add('R01');

        $this->assertEquals(54.37, $basket->total());
    }

    public function testTotalWithMixedProducts() {
        $basket = new Basket($this->products, $this->offers, $this->deliveryCharge);
        $basket->add('R01');
        $basket->add('G01');

        $this->assertEquals(60.85, $basket->total());
    }

    public function testTotalWithMultipleProducts() {
        $basket = new Basket($this->products, $this->offers, $this->deliveryCharge);
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');

        $this->assertEquals(98.27, $basket->total());
    }
}