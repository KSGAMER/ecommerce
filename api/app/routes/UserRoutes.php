<?php 

    $app->get('/greetings', 'UserController:helloUser');

    $app->get('/helloUser/{user}', 'UserController:user');

    $app->post('/login', 'UserController:auth');
    
?>