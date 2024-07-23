<?php

require_once 'src/Product.php';
require_once 'src/Offer.php';
require_once 'src/DeliveryCharge.php';
require_once 'src/Basket.php';

// Initialize product catalogue
$products = [
    'R01' => new Product('R01', 'Red Widget', 32.95),
    'G01' => new Product('G01', 'Green Widget', 24.95),
    'B01' => new Product('B01', 'Blue Widget', 7.95)
];

// Delivery charge rules
$deliveryRules = [
    'under_50' => 4.95,
    'under_90' => 2.95,
    'over_90' => 0.00
];
$deliveryCharge = new DeliveryCharge($deliveryRules);

// Special offers
$offers = [
    'R01' => new Offer('R01', 'buy_one_get_second_half_price')
];

// Initialize the basket
$basket = new Basket($products, $offers, $deliveryCharge);

// Add products to the basket
$basket->add('B01');
$basket->add('G01');

// Output the total cost
echo "Total: $" . $basket->total() . "\n";

$basket2 = new Basket($products, $offers, $deliveryCharge);
$basket2->add('R01');
$basket2->add('R01');
echo "Total: $" . $basket2->total() . "\n";

$basket3 = new Basket($products, $offers, $deliveryCharge);
$basket3->add('R01');
$basket3->add('G01');
echo "Total: $" . $basket3->total() . "\n";

$basket4 = new Basket($products, $offers, $deliveryCharge);
$basket4->add('B01');
$basket4->add('B01');
$basket4->add('R01');
$basket4->add('R01');
$basket4->add('R01');
echo "Total: $" . $basket4->total() . "\n";
?>