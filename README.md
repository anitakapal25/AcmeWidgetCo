Acme Widget Co Sales System
This project is a proof of concept for Acme Widget Co's sales system. It includes a simple PHP-based basket system that handles products, offers, and delivery charges.

Table of Contents
Product Catalogue
Delivery Charge Rules
Special Offers
Usage
Project Structure
Running the Project
Running Tests
Static Analysis
Assumptions
Product Catalogue
Red Widget (R01) - $32.95
Green Widget (G01) - $24.95
Blue Widget (B01) - $7.95
Delivery Charge Rules
Orders under $50: $4.95
Orders under $90: $2.95
Orders $90 or more: Free delivery
Special Offers
Buy one red widget, get the second half price.

Usage
Clone the repository.
Ensure you have Docker and Docker Compose installed.
Build and run the project using Docker Compose.

Project Structure

ACME-WIDGET-CO/
├── src/
│   ├── Basket.php
│   ├── Product.php
│   ├── Offer.php
│   ├── DeliveryCharge.php
│   └── Interfaces/
│       ├── OfferInterface.php
│       └── DeliveryChargeInterface.php
├── tests/
│   ├── BasketTest.php
│   ├── ProductTest.php
│   ├── OfferTest.php
│   └── DeliveryChargeTest.php
├── vendor/
├── composer.json
├── docker-compose.yml
├── Dockerfile
└── index.php
Running the Project
To build and run the project in a Docker container, execute the following command:


docker-compose up --build
The application will be accessible at http://localhost:8000.

Running Tests
The project uses PHPUnit for testing. To run the tests, execute:

vendor/bin/phpunit --bootstrap vendor/autoload.php tests

Assumptions
The only special offer implemented is "buy one red widget, get the second half price."
Delivery charges are calculated based on the total amount before applying any delivery charge.
Example Baskets
Products: B01, G01

Total: $37.85
Products: R01, R01

Total: $54.37
Products: R01, G01

Total: $60.85
Products: B01, B01, R01, R01, R01

Total: $98.27