<?php 
    namespace app\Models;

    class ProductsModel extends Models {
        function selectProducts() {
            $result = $this->db->select('products', ['productCode', 'productName', 'productLine', 'productScale', 'productVendor', 'productDescription', 'productDescription', 'quantityInStock', 'buyPrice', 'MSRP']);

            if(!is_null($this->db->error()[1])) {
                return array(
                'error' => true, 
                'description' => $this->db->error()[2]
            );
            } else if(empty($result)) {
                return array('notFound' => true, 'description' => 'The result is empty');
            }
            return array(
                'success' => true,
                'description' => 'The products were found',
                'products' => $result
            );
        }

        function insertProducts($products) {
            $result = $this->db->insert('products', [
                'productCode' => $products['productCode'],
                'productName' => $products['productName'],
                'productLine' => $products['productLine'],
                'productScale' => $products['productScale'],
                'productVendor' => $products['productVendor'],
                'productDescription' => $products['productDescription'],
                'quantityInStock' => $products['quantityInStock'],
                'buyPrice' => $products['buyPrice'],
                'MSRP' => $products['MSRP']
            ]);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The products was inserted'
            );
        }

        function updateProducts($id, $products) {
            $result = $this->db->update('products', [
                'productName' => $products['productName'],
                'productLine' => $products['productLine'],
                'productScale' => $products['productScale'],
                'productVendor' => $products['productVendor'],
                'productDescription' => $products['productDescription'],
                'quantityInStock' => $products['quantityInStock'],
                'buyPrice' => $products['buyPrice'],
                'MSRP' => $products['MSRP']
            ], ['productCode' => $id]);

            if(!is_null($this->db->error()[1])) {
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The product was updated'
            );
        }
    }
?>