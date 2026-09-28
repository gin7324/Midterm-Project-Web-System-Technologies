<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::home', ['as' => 'home']);
$routes->get('about', 'Pages::about', ['as' => 'about']);
$routes->get('products', 'Products::index', ['as' => 'products']);
$routes->get('products/new', 'Products::new', ['as' => 'products.new']);
$routes->post('products', 'Products::create', ['as' => 'products.create']);
$routes->get('products/(:num)/edit', 'Products::edit/$1', ['as' => 'products.edit']);
$routes->post('products/(:num)', 'Products::update/$1', ['as' => 'products.update']);
$routes->post('products/(:num)/delete', 'Products::delete/$1', ['as' => 'products.delete']);
$routes->get('customers', 'Customers::index', ['as' => 'customers']);
$routes->get('customers/new', 'Customers::new', ['as' => 'customers.new']);
$routes->post('customers', 'Customers::create', ['as' => 'customers.create']);
$routes->get('customers/(:num)/edit', 'Customers::edit/$1', ['as' => 'customers.edit']);
$routes->post('customers/(:num)', 'Customers::update/$1', ['as' => 'customers.update']);
$routes->post('customers/(:num)/delete', 'Customers::delete/$1', ['as' => 'customers.delete']);
$routes->get('users', 'Users::index', ['as' => 'users']);
$routes->get('sales', 'Sales::index', ['as' => 'sales']);
