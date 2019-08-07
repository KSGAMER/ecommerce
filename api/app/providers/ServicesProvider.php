<?php
    $container['Encrypt'] = function($container) {
        return new app\Services\Encrypt($container);
    };
?>