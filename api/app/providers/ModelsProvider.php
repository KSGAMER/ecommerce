<?php 

    $container['EmployeesModel'] = function($container) {
        
        return new app\Models\EmployeesModel($container);
    };

    $container['ProductsModel'] = function($container) {
        return new app\Models\ProductsModel($container);
    };

    $container['OfficesModel'] = function($container) {
        return new app\Models\OfficesModel($container);
    };

    $container['CustomersModel'] = function($container) {
        return new app\Models\CustomersModel($container);
    };

    $container['OrdersModel'] = function($container) {
        return new app\Models\OrdersModel($container);
    };

    $container['UserModel'] = function($container) {
        return new app\Models\UserModel($container);
    };
?>