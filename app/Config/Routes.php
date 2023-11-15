<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::index');
$routes->post('login/login', 'Home::login');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('vendor', 'Vendor::index');
$routes->get('vendorRegistration', 'VendorRegistration::index');
$routes->post('/add-vendor', 'VendorRegistration::addVendor');
$routes->get('lotno', 'Lotno::index');
$routes->get('addnewlot', 'AddLot::index');
$routes->post('/add-lot', 'AddLot::addLot');
$routes->get('setting', 'Setting::index');
$routes->get('report', 'Report::index');
$routes->post('setting/deleteUser', 'Setting::deleteUser');
$routes->get('bondin', 'BondIn::index');
$routes->get('bondtransaction', 'Bondtransaction::index');
$routes->get('bondout', 'BondOut::index');
$routes->get('report', 'Report::index');
$routes->get('user', 'User::index');
$routes->post('user/adduser', 'User::adduser'); 
$routes->get('profile', 'Profile::index');
$routes->get('profilepermission', 'ProfilePermission::index');
$routes->post('profilepermission', 'ProfilePermission::updateProfile');
$routes->get('log', 'Log::index');
$routes->get('user/edit/(:num)', 'User::edit/$1');
$routes->post('user/updateuser/(:num)', 'User::updateuser/$1');
$routes->post('profilepermission/updateStatus', 'ProfilePermission::updateStatus');
$routes->get('profilepermission/getPermissionsByProfile/(:num)', 'ProfilePermission::getPermissionsByProfile/$1');
$routes->get('profilepermission/getMembersByProfile/(:num)', 'ProfilePermission::getMembersByProfile/$1');






