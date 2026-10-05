<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Pages::home', ['as' => 'home']);
$routes->get('about', 'Pages::about', ['as' => 'about']);

/*
 * Products
 */
$routes->get('products', 'Products::index', [
    'as' => 'products',
    'filter' => 'auth'
]);

$routes->get('products/new', 'Products::new', [
    'as' => 'products.new',
    'filter' => 'auth'
]);

$routes->post('products', 'Products::create', [
    'as' => 'products.create',
    'filter' => 'auth'
]);

$routes->get('products/(:num)/edit', 'Products::edit/$1', [
    'as' => 'products.edit',
    'filter' => 'auth'
]);

$routes->post('products/(:num)', 'Products::update/$1', [
    'as' => 'products.update',
    'filter' => 'auth'
]);

$routes->post('products/(:num)/delete', 'Products::delete/$1', [
    'as' => 'products.delete',
    'filter' => 'auth'
]);

/*
 * Customers
 */
$routes->get('customers', 'Customers::index', [
    'as' => 'customers',
    'filter' => 'auth'
]);

$routes->get('customers/new', 'Customers::new', [
    'as' => 'customers.new',
    'filter' => 'auth'
]);

$routes->post('customers', 'Customers::create', [
    'as' => 'customers.create',
    'filter' => 'auth'
]);

$routes->get('customers/(:num)/edit', 'Customers::edit/$1', [
    'as' => 'customers.edit',
    'filter' => 'auth'
]);

$routes->post('customers/(:num)', 'Customers::update/$1', [
    'as' => 'customers.update',
    'filter' => 'auth'
]);

$routes->post('customers/(:num)/delete', 'Customers::delete/$1', [
    'as' => 'customers.delete',
    'filter' => 'auth'
]);

/*
 * Users / Staff
 */
$routes->get('users', 'Users::index', [
    'as' => 'users',
    'filter' => 'auth'
]);

$routes->get('users/new', 'Users::new', [
    'as' => 'users.new',
    'filter' => 'auth'
]);

$routes->post('users/create', 'Users::create', [
    'as' => 'users.create',
    'filter' => 'auth'
]);

$routes->get('users/edit/(:num)', 'Users::edit/$1', [
    'as' => 'users.edit',
    'filter' => 'auth'
]);

$routes->post('users/update/(:num)', 'Users::update/$1', [
    'as' => 'users.update',
    'filter' => 'auth'
]);

$routes->post('users/delete/(:num)', 'Users::delete/$1', [
    'as' => 'users.delete',
    'filter' => 'auth'
]);

/*
 * Sales
 */
$routes->get('sales', 'Sales::index', [
    'as' => 'sales',
    'filter' => 'auth'
]);

/*
 * Authentication
 */
$routes->get('login', 'Auth::login', [
    'as' => 'login'
]);

$routes->post('login', 'Auth::attempt', [
    'as' => 'login.attempt'
]);

$routes->get('logout', 'Auth::logout', [
    'as' => 'logout'
]);