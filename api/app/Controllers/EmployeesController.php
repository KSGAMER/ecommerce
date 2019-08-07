<?php 
    namespace app\Controllers;

    class EmployeesController extends Controllers {

        function selectEmployees($request, $response) {
            
            $message = $this->EmployeesModel->selectEmployees();

            return json_encode($message);
        }

        function selectEmployeesByID($request, $response) {
            $id = $request->getAttribute('id');

            $message = $this->EmployeesModel->selectEmployeesByID($id);

            return json_encode($message);
        }

        function insertEmployees($request, $response) {
            $employee = $request->getParsedBody();
            
            $message = $this->EmployeesModel->insertEmployees($employee);

            return json_encode($message);
        }

        function updateEmployees($request, $response) {
            $id = $request->getAttribute('id');

            $employee = $request->getParsedBody();

            $message = $this->EmployeesModel->updateEmployees($id, $employee);

            return json_encode($message);
        }

    }
?>