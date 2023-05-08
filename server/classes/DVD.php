<?php 
class DVD extends Product{

    public function save($data){
        $this->db->create($data);
    }
}