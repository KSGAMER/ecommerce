<?php
    namespace app\Controllers;

    class OrdersController extends Controllers {

        function insertOrders($request, $response) {
            $order = $request->getParsedBody();

            $message = $this->OrdersModel->insertOrders($order);

            return json_encode($message);
        }

        function selectOrders($request, $response) {
            $message = $this->OrdersModel->selectOrders();

            return json_encode($message);
        }
    }
?>