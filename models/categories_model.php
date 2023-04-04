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
    }
?>