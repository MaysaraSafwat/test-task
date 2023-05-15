<?php 
class DVD extends Product{

    public function save($data){
      
        
        $sku = $data['sku'];
        $name = $data['name'];
       $price= $data['price'];
        $product_type= $data['product_type'];
        $product_specifications = $data['product_specifications'];
        
        $validateDvd = new DvdValidation(
            $sku,
            $name,
            $price,
            $product_type,
            $product_specifications
       );
       $errors =$validateDvd->get_errors();
       if(count($errors) > 0) {
           http_response_code(400);
       } else {
           try {
               $dvdData = $validateDvd->create_product_data();
               $this->db->create($dvdData);
           }
           catch(Exception $e) {
               return "Couldn't create Product";
           }
       }
   }
}