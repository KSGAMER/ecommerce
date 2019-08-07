<?php 

    $app->get('/employees', 'EmployeesController:selectEmployees');

    $app->get('/employees/{id}', 'EmployeesController:selectEmployeesByID');

    $app->post('/employees', 'EmployeesController:insertEmployees');

    $app->post('/employees/{id}', 'EmployeesController:updateEmployees');
?>