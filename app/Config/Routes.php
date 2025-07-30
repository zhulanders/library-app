<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/books', 'Books::index');        
$routes->get('/books/create', 'Books::create'); 
$routes->post('/books/store', 'Books::store'); 