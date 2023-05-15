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
            $response = array("message"=> $errors);
            return json_encode($response);
        } else {
            try {
                $bookData = $validateBook->create_product_data();
                $this->db->create($bookData);
            }
            catch(Exception $e) {
                http_response_code(500);
                $response = array("message"=>"something went wrong".$e);
                return json_encode($response);
            }
        }
    }
}