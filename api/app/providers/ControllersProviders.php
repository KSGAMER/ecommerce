<?php 
    // Se agregan los controllers (Controladores) al contexto de la app (Container)
    $container['UserController'] = function($container) {
        return new app\Controllers\UserController($container);
    };

    $container['EmployeesController'] = function($container) {
        return new app\Controllers\EmployeesController($container);
    };

    $container['ProductsController'] = function($container) {
        return new app\Controllers\ProductsController($container);
    };

    $container['OfficesController'] = function($container) {
        return new app\Controllers\OfficesController($container);
    };

    $container['CustomersController'] = function($container) {
        return new app\Controllers\CustomersController($container);
    };

    $container['OrdersController'] = function($container) {
        return new app\Controllers\OrdersController($container);
    };

?>