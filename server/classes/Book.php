<?php 
class Book extends Product{

    public function save($data){
      
        
         $sku = $data['sku'];
         $name = $data['name'];
         $product_type= $data['product_type'];
         $price= $data['price'];
         $product_specifications = $data['product_specifications'];
         
         $validateBook = new BookValidation(
            $sku,
            $name,
            $price,
            $product_type,
            $product_specifications
        );
        $errors =$validateBook->get_errors();
        if(count($errors) > 0) {
            http_response_code(400);
            var_dump($errors);
        } else {
            try {
                $bookData = $validateBook->create_product_data();
                $this->db->create($bookData);
            }
            catch(Exception $e) {
                return "Couldn't create Product";
            }
        }
    }
}