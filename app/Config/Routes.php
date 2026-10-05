<?php
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */


// inicio de sesión
$routes->get('/', 'Autenticacion::login');
$routes->get('login', 'Autenticacion::login');
$routes->get('registro', 'Autenticacion::registro');
$routes->post('autenticacion/registrar', 'Autenticacion::registrar');
$routes->post('autenticacion/ingresar', 'Autenticacion::ingresar');
$routes->get('salir', 'Autenticacion::salir');


