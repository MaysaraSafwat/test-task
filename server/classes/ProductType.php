<?php
class ProductType {

   public static function get_product_instance (string $type) : Product{ 
        $productTypesArr = array(
            "book" => new Book(),
            "dvd" => new DVD(),
            "furniture"=> new Furniture()
        );

        if(!isset($productTypesArr[$type])){
            throw new Exception("Invalid Product Type");
        }
      
        return   $productTypesArr[$type];
    }
}