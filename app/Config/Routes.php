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

$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Exámenes
    $routes->get('examenes', 'Examenes::index');
    $routes->get('examenes/listar', 'Examenes::listar');      
    $routes->get('examenes/obtener/(:num)', 'Examenes::obtener/$1'); 
    $routes->post('examenes/guardar', 'Examenes::guardar');   
    $routes->post('examenes/eliminar', 'Examenes::eliminar'); 

});