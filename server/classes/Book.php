<?php 
class Book extends Product{

    public function save($data){
        $this->db->create($data);
    }
}