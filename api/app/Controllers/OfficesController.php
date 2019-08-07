<?php 
     namespace app\Controllers;

     class OfficesController extends Controllers {

         function selectOffices($request, $response) {
             $message = $this->OfficesModel->selectOffices();

             return json_encode($message);
         }

         function insertOffices($request, $response) {
             $office = $request->getParsedBody();

             $message = $this->OfficesModel->insertOffices($office);

             return json_encode($message);
         }

         function updateOffices($request, $response) {
             $id = $request->getAttribute('id');

             $office = $request->getParsedBody();

             $message = $this->OfficesModel->updateOffices($id, $office);

             return json_encode($message);
         }
     }
?>