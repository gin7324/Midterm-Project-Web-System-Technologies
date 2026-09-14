# Groupmate implementation guide

This branch covers the shared database schema plus Product and Customer CRUD. The following work remains for the other requirements:

## 4. Staff management

- Add a `Users` model and replace the placeholder `Users` controller with full CRUD.
- Validate and store avatar uploads in a public upload directory, saving only a relative path in `users.avatar`.
- Hash passwords with `password_hash($password, PASSWORD_DEFAULT)` before insert/update. Never display or log the password.

## 5. Authentication and access control

- Add login and logout endpoints that verify `users.username` and `password_verify()`.
- Store the authenticated staff ID in the session.
- Add an `Auth` filter and apply it to every management route, including products and customers. Leave login and logout public.
- Regenerate the session ID after login and destroy the session on logout.

## 6. Record Sale

- Add a sale form that loads products and optional customers.
- Validate that quantity is a positive integer.
- In one database transaction, lock the selected product row, verify stock, insert the sale, and decrement `products.stock_quantity`.
- Roll back and show a clear message when requested quantity exceeds available stock.

## 7. Sales History

- Add a sales history query joining `sales` to `products`, `customers`, and `users`.
- Display product, customer when present, staff member, quantity, total price, and created date.
- Restrict the page with the authentication filter.