<?php
    class categories_model extends main_model {

        public function getParent($id) {
            $query = "SELECT * FROM $this->table where id=$id";
            $result = mysqli_query($this->con,$query);
            if($result) {
                $record = mysqli_fetch_assoc($result);
            } 
            else $record=false;
            return $record;
        }
        
        public function editPathChild($newPath,$oldPath){
            $start = strlen($oldPath) + 1;
            $query = "UPDATE $this->table SET path = CONCAT('$newPath', SUBSTRING(path, $start)) WHERE path like '$oldPath%'";
            return mysqli_query($this->con,$query);
        }

        public function delRecord($path){
            $query = "DELETE FROM $this->table WHERE path like '".$path."%'";
            return mysqli_query($this->con,$query);
        }
    }
?>