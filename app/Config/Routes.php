<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/try', 'TryController::getData');
$routes->post('/try/data', 'TryController::createData');  // Route to handle POST requests\

$routes->post('/signup', 'AuthController::signup');
$routes->post('/login', 'AuthController::login');
$routes->post('/logout', 'AuthController::logout');

$routes->get('/get-customers-accounts', 'AuthController::getCustomers');
$routes->get('/get-user/(:segment)', 'AuthController::getUser/$1');


$routes->get('/get-sessions', 'SessionController::getSessions');
$routes->get('/get-session/(:segment)', 'SessionController::getSession/$1');
$routes->post('/add-session', 'SessionController::addSession');
$routes->put('/update-session/(:segment)', 'SessionController::updateSession/$1');


$routes->get('/get-categories', 'CategoryController::getCategories');


$routes->get('/get-menu', 'MenuController::getMenu');

$routes->get('/get-orders/(:segment)', 'OrderController::getOrdersBySession/$1');
$routes->get('/get-orders', 'OrderController::getOrders');
$routes->post('/add-order', 'OrderController::addOrder');
$routes->put('/update-order/(:segment)', 'OrderController::updateOrder/$1');
$routes->delete('/delete-order/(:segment)', 'OrderController::deleteOrder/$1');

// $routes->post('/add-online-order', 'OnlineOrderController::addOrder');
$routes->post('/create-online-order', 'OnlineOrderController::startOnlineOrder');
$routes->put('/update-online-order/(:segment)', 'OnlineOrderController::updateOnlineOrder/$1');
$routes->get('/get-online-order/(:num)', 'OnlineOrderController::getOnlineOrder/$1');
$routes->put('/confirmOrder/(:segment)', 'OnlineOrderController::confirmOrder/$1');


$routes->get('/get-order-details', 'OrderDetailsController::getAllOrderDetails');
$routes->get('/get-order-details/(:segment)', 'OrderDetailsController::getOrderDetails/$1');
$routes->post('/add-or-update-order-detail', 'OrderDetailsController::addOrUpdateOrderDetail');
$routes->put('/update-order-detail/(:segment)', 'OrderDetailsController::updateOrderDetail/$1');
$routes->delete('/delete-order-detail/(:segment)', 'OrderDetailsController::deleteOrderDetail/$1');
$routes->post('/update-order-status', 'OrderDetailsController::updateOrderStatus');




$routes->post('/add-or-update-online-order-detail', 'OnlineOrderDetailsController::addOrUpdateOnlineOrderDetail');
$routes->get('/get-online-order-details/(:segment)', 'OnlineOrderDetailsController::getOnlineOrderDetails/$1');
$routes->delete('/remove-order-detail/(:num)', 'OnlineOrderDetailsController::deleteOnlineOrderDetail/$1');



$routes->get('/get-customers', 'CustomerController::getCustomers');
$routes->post('/add-customer', 'CustomerController::addCustomer');









// $routes->post('/notification/send', 'NotificationsController::sendNotification');
$routes->post('save-token', 'NotifController::saveToken');
$routes->post('send-notification', 'NotifController::sendNotification');