<?php
    $app->post('/orders', 'OrdersController:insertOrders');

    $app->get('/orders', 'OrdersController:selectOrders');
?>