<?php
    class products_model extends main_model {

        public function createTable() {
            // sql to create table
            $sql = "CREATE TABLE `products` (
                `id` int NOT NULL,
                `name` int NOT NULL,
                `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `price` int NOT NULL,
                `quantity` int NOT NULL,
                `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
            $result = $this->con->query($sql);
            return $result;
        }

        public function getAllRecords($fields='*', $options=null) {
            $conditions = '';
            if(isset($options['conditions'])) {
                $conditions .= ' where '.$options['conditions'];
            }
            $fields = 'products.id, name, product_name, description, price, quantity, photo';
            $query = "SELECT ".$fields." FROM ".$this->table.$conditions." INNER JOIN categories ON categories.id = products.category_id";
            $result = mysqli_query($this->con,$query);
            return $result;
        }
        
    }
?>