<?php 
    namespace app\Models;

    class EmployeesModel extends Models {

        function selectEmployees() {
            $result = $this->db->select('employees', ['[><]offices' => ['employees.officeCode' => 'officeCode']] , ['employees.employeeNumber', 'employees.lastName', 'employees.firstName', 'employees.extension', 'employees.email', 'offices.city', 'employees.reportsTo', 'employees.jobTitle']);
            
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
                'description' => 'The employees were found',
                'employees' => $result
            );
        }

        function selectEmployeesByID($id) {
            
            $result = $this->db->select('employees', 
            ['[><]offices' => ['employees.officeCode' => 'officeCode']], ['employees.employeeNumber', 'employees.lastName', 'employees.firstName', 'employees.extension', 'employees.email', 'offices.city', 'employees.reportsTo', 'employees.jobTitle'], ['employees.employeeNumber' => $id]);
            
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
                'description' => 'The employee were found',
                'employees' => $this->Encrypt->encryption($result)
            );
        }

        function insertEmployees($employee) {
            $result = $this->db->insert('employees', [
                'employeeNumber' => $employee['employeeNumber'],
                'lastName' => $employee['lastName'],
                'firstName' => $employee['firstName'],
                'extension' => $employee['extension'],
                'email' => $employee['email'],
                'officeCode' => $employee['officeCode'],
                'reportsTo' => $employee['reportsTo'],
                'jobTitle' => $employee['jobTitle']
            ]);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'success' => false, 
                    'description' => $this->db->error()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The employee was inserted'
            );
        }

        function updateEmployees($id, $employee) {
            $result = $this->db->update('employees', [
                'lastName' => $employee['lastName'],
                'firstName' => $employee['firstName'],
                'extension' => $employee['extension'],
                'email' => $employee['email'],
                'officeCode' => $employee['officeCode'],
                'reportsTo' => $employee['reportsTo'],
                'jobTitle' => $employee['jobTitle']
            ], ['employeeNumber' => $id]);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The employee was updated'
            );
        }

    }
?>