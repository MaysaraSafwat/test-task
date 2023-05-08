<?php 
class Request {
   
    public function processRequest($method, ?string $type): void
    {
        //var_dump($method, $type);
        if($type){
            $this->handleIndivRequest($method,$type);
        }else{
             $this->handleCollectionRequest($method);
        }
    }

    public function handleIndivRequest($method, $type){
        if ($method =='POST') {
            $data = (array) json_decode(file_get_contents("php://input"), true, 512,JSON_BIGINT_AS_STRING);
            if($type == 'dvd') {
               $dvd = new DVD();
               $dvd->save($data);
            } elseif($type=='book') {
                $book = new Book();
                try{
                 $book->save($data);
                }catch(Exception $e){
                    echo "something went wrong could not save data".$e;
                }
            } else {
                http_response_code(404);
            }
        }
    }

    public function handleCollectionRequest($method){
        //for retrieving all data
        if($method =='GET'){
          $product = new Book();
          $products = $product->get_all_products();
         echo json_encode($products);
        }
        //for mass delete
         elseif ($method == "POST"){
          $product = new DVD();
          $ids = (array) json_decode(file_get_contents("php://input"), true, 512,JSON_BIGINT_AS_STRING);
          $product->mass_delete__products($ids);
         }
    }
}