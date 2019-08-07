<?php 
    $app->get('/products', 'ProductsController:selectProducts');

    $app->post('/products', 'ProductsController:insertProducts');

    $app->post('/products/{id}', 'ProductsController:updateProducts');
?>