<?php
    namespace app\Models;

    class CustomersModel extends Models {

        // function selectCustomers() {
        //     $result = $this->db->select('customers', [
        //         'customerNumber',
        //         'customerName',
        //         'contactLastName',
        //         'contactFirstName',
        //         'phone',
        //         'addressLine1',
        //         'addressLine2',
        //         'city',
        //         'state',
        //         'postalCode',
        //         'country',
        //         'salesRepEmployeeNumber',
        //         'creditLimit'
        //     ]);

        //     if(!is_null($this->db->error()[1])) {
        //         return array(
        //             'error' => true,
        //             'description' => $this->db->error()[2]
        //         );
        //     } else if(empty($result)) {
        //         return array(
        //             'notFound' => true,
        //             'description' => 'The result is empty'
        //         );
        //     }

        //     return array(
        //         'success' => true,
        //         'description' => 'The customers were found',
        //         'customers' => $result
        //     );
        // }

        function selectCustomers() {
            $sth = $this->db->pdo->prepare('SELECT customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, postalCode, country, salesRepEmployeeNumber, creditLimit FROM customers');
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            
            if($sth->errorInfo()[1]) {
                return array(
                    'error' => true,
                    'description' => $sth->errorInfo()[2]
                );
            } else if(empty($result)) {
                return array(
                    'notFound' => true,
                    'description' => 'The result is empty'
                );
            }

            return array(
                'success' => true,
                'description' => 'The customers were found',
                'customers' => $this->Encrypt->encryption($result)
            );
        }

        function insertCustomers($customer) {
            $result = $this->db->pdo->prepare('INSERT INTO customers(customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit)
            VALUES (:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)');

            $result->bindParam(':customerNumber', $customer['customerNumber']);
            $result->bindParam(':customerName', $customer['customerName']);
            $result->bindParam(':contactLastName', $customer['contactLastName']);
            $result->bindParam(':contactFirstName', $customer['contactFirstName']);
            $result->bindParam(':phone', $customer['phone']);
            $result->bindParam(':addressLine1', $customer['addressLine1']);
            $result->bindParam(':addressLine2', $customer['addressLine2']);
            $result->bindParam(':city', $customer['city']);
            $result->bindParam(':state', $customer['state']);
            $result->bindParam(':postalCode', $customer['postalCode']);
            $result->bindParam(':country', $customer['country']);
            $result->bindParam(':salesRepEmployeeNumber', $customer['salesRepEmployeeNumber']);
            $result->bindParam(':creditLimit', $customer['creditLimit']);

            $result->execute();

            if($result->errorInfo()[1]) {
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The customer was inserted'
            );
        }

        function updateCustomers($id, $customer) {
            $result = $this->db->pdo->prepare('UPDATE customers SET customerName = :customerName, contactLastName = :contactLastName, contactFirstName = :contactFirstName, phone = :phone, addressLine1 = :addressLine1, addressLine2 = :addressLine2, city = :city, state = :state, postalCode = :postalCode, country = :country, salesRepEmployeeNumber = :salesRepEmployeeNumber, creditLimit = :creditLimit WHERE customerNumber = :customerNumber');

            $result->bindParam(':customerNumber', $id);
            $result->bindParam(':customerName', $customer['customerName']);
            $result->bindParam(':contactLastName', $customer['contactLastName']);
            $result->bindParam(':contactFirstName', $customer['contactFirstName']);
            $result->bindParam(':phone', $customer['phone']);
            $result->bindParam(':addressLine1', $customer['addressLine1']);
            $result->bindParam(':addressLine2', $customer['addressLine2']);
            $result->bindParam(':city', $customer['city']);
            $result->bindParam(':state', $customer['state']);
            $result->bindParam(':postalCode', $customer['postalCode']);
            $result->bindParam(':country', $customer['country']);
            $result->bindParam(':salesRepEmployeeNumber', $customer['salesRepEmployeeNumber']);
            $result->bindParam(':creditLimit', $customer['creditLimit']);

            $result->execute();
            
            if($result->errorInfo()[1]) {
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The customer was updated'
            );
        }

        // function insertCustomers($customer) {
        //     $result = $this->db->insert('customers', [
        //             'customerNumber' => $customer['customerNumber'],
        //             'customerName' => $customer['customerName'],
        //             'contactLastName' => $customer['contactLastName'],
        //             'contactFirstName' => $customer['contactFirstName'],
        //             'phone' => $customer['phone'],
        //             'addressLine1' => $customer['addressLine1'],
        //             'addressLine2' => $customer['addressLine2'],
        //             'city' => $customer['city'],
        //             'state' => $customer['state'],
        //             'postalCode' => $customer['postalCode'],
        //             'country' => $customer['country'],
        //             'salesRepEmployeeNumber' => $customer['salesRepEmployeeNumber'],
        //             'creditLimit' => $customer['creditLimit']
        //     ]);

        //     if(!is_null($this->db->error()[1])) {
        //         return array(
        //             'success' => false,
        //             'description' => $this->db->error()[2]
        //         );
        //     }

        //     return array(
        //         'success' => true,
        //         'description' => 'The customer was inserted'
        //     );
        // }
            
        // function updateCustomers($id, $customer) {
        //     $result = $this->db->update('customers', [
        //         'customerName' => $customer['customerName'],
        //         'contactLastName' => $customer['contactLastName'],
        //         'contactFirstName' => $customer['contactFirstName'],
        //         'phone' => $customer['phone'],
        //         'addressLine1' => $customer['addressLine1'],
        //         'addressLine2' => $customer['addressLine2'],
        //         'city' => $customer['city'],
        //         'state' => $customer['state'],
        //         'postalCode' => $customer['postalCode'],
        //         'country' => $customer['country'],
        //         'salesRepEmployeeNumber' => $customer['salesRepEmployeeNumber'],
        //         'creditLimit' => $customer['creditLimit']
        //     ], ['customerNumber' => $id]);

        //     if(!is_null($this->db->error()[1])) {
        //         return array(
        //             'success' => false,
        //             'description' => $this->db->error()[2]
        //         );
        //     }

        //     return array(
        //         'success' => true,
        //         'description' => 'The customer was updated'
        //     );
        // }
    }
?>