<?php 
    // Configuración de la base de datos
    $db = require $context_app . '/app/database/config.php';

    // Key de encriptación
    $jwt = array(
        'key' => '%t/H$kw8]:BCS.]X', 'algorithms' => array('HS256')
    );

    // Configuración de la aplicación
    $settings = array(
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
        'db' => $db,
        'jwt' => $jwt
    );

    // Se agrega el contexto de la Aplicación
    $settings['context'] = $context_app;
    
    return $settings;
    
?>