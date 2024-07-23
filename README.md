# Acme Widget Co Sales System

This is a proof of concept for the Acme Widget Co sales system.

## Product Catalogue
- Red Widget (R01) - $32.95
- Green Widget (G01) - $24.95
- Blue Widget (B01) - $7.95

## Delivery Charge Rules
- Orders under $50: $4.95
- Orders under $90: $2.95
- Orders $90 or more: Free delivery

## Special Offers
- Buy one red widget, get the second half price.

## Usage

1. Clone the repository.
2. Run `index.php` in a PHP server.

## Example Baskets

1. Products: B01, G01
   - Total: $37.85

2. Products: R01, R01
   - Total: $54.37

3. Products: R01, G01
   - Total: $60.85

4. Products: B01, B01, R01, R01, R01
   - Total: $98.27

## Assumptions
- The only special offer implemented is "buy one red widget, get the second half price".
- Delivery charges are added based on the total amount before applying any delivery charge.
