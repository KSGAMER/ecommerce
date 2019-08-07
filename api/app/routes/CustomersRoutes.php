<?php 

    $app->get('/customers', 'CustomersController:selectCustomers');

    $app->post('/customers', 'CustomersController:insertCustomers');

    $app->post('/customers/{id}', 'CustomersController:updateCustomers');
?>