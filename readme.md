# SFL Test
Simple Cafe Manager Assignment

## Requirements
* PHP >= 7.0
* MySql >= 5.5

### Installing
Copy `.env.example` file to `.env` and correct database credentials.

In application root folder run commands

1. `composer install`
2. `php artisan migrate`
3. `php artisan db:seed`

#### Notes
Seeders would create one manager and one waiter users.
##### Credentials for login
###### Manager 
* email     : `manager@email.com`
* password  : `manager_password`

###### Waiter
* email     : `waiter@email.com`
* password  : `waiter_password`

Also, seeders would create roles named
* `manager`
* `waiter`