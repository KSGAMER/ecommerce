<?php

    $app->get('/offices', 'OfficesController:selectOffices');

    $app->post('/offices', 'OfficesController:insertOffices');

    $app->post('/offices/{id}', 'OfficesController:updateOffices');
?>