<?php
    namespace app\Models;

    class UserModel extends Models {
        function auth($auth) {
            $result = $this->db->select('employees', ['email'], ['email' => $auth['email']]);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'error' => true, 
                    'description' => $this->db->error()[2]
                );
            } else if(empty($result)) {
                return array(
                    'notFound' => true,
                    'description' => 'The email is incorrect'
                );
            }

            $result = $this->db->select('employees', ['email'], ['email' => $auth['email'], 'employeeNumber' => $auth['employeeNumber']]);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'error' => true, 
                    'description' => $this->db->error()[2]
                );
            } else if(empty($result)) {
                return array(
                    'notFound' => true,
                    'description' => 'The password is incorrect'
                );
            }
            return array(
                'Token' => $this->Encrypt->encryption($result[0]['email'])
            );
        }
    }
?>