<?php 
    namespace app\Models;

    class OfficesModel extends Models {
        function selectOffices() {
            $result = $this->db->select('offices', ['officeCode', 'city', 'phone', 'addressLine1', 'addressLine2', 'state', 'country', 'postalCode', 'territory']);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'error' => true,
                    'description' => $this->db->error()[2]
                );
            } else if(empty($result)) {
                return array(
                    'notFound' => true,
                    'description' => 'The result is empty'
                );
            }
            return array(
                'success' => true,
                'description' => 'The Offices were found',
                'offices' => $this->Encrypt->encryption($result)
            );
        }

        function insertOffices($office) {
            $result = $this->db->insert('offices', [
                'officeCode' => $office['officeCode'],
                'city' => $office['city'],
                'phone' => $office['phone'],
                'addressLine1' => $office['addressLine1'],
                'addressLine2' => $office['addressLine2'],
                'state' => $office['state'],
                'country' => $office['country'],
                'postalCode' => $office['postalCode'],
                'territory' => $office['territory']
            ]);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'success' => false,
                    'description' => $this->db-error()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The office was inserted'
            );
        }

        function updateOffices($id, $office) {
            $result = $this->db->update('offices', [
                'city' => $office['city'],
                'phone' => $office['phone'],
                'addressLine1' => $office['addressLine1'],
                'addressLine2' => $office['addressLine2'],
                'state' => $office['state'],
                'country' => $office['country'],
                'postalCode' => $office['postalCode'],
                'territory' => $office['territory']
            ], ['officeCode' => $id]);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The office was updated'
            );
        }
    }
?>