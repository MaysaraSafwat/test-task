<?php

use Pecee\SimpleRouter\SimpleRouter;


  
  SimpleRouter::group(['prefix' => '/scandiweb-test-task/server/'], function () {
    SimpleRouter::get('/products', function ()    {
       try {
        $product = new Book();
        $products = $product->get_all_products();
        echo json_encode($products);
        }catch(Exception $e){
            http_response_code(500);
            echo"something went wrong".$e;
        }
    });

    SimpleRouter::post('/products/{type}' , function($type){
        //create new product
        try {
            $data = (array) json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
            $product =  ProductType::get_product_instance($type);
            $product->save($data);
        }catch(Exception $e){
            http_response_code(500);
            echo"something went wrong".$e;
        }
    });

    SimpleRouter::post('/products' , function(){
        //mass delete products
        try {
            $data = (array) json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
            $product = new Book();
            $res= $product->mass_delete_products($data);
            http_response_code(200);
            echo "Records Deleted Successfully";
        }catch(Exception $e){
            http_response_code(500);
            echo"something went wrong".$e;
        }
         });
});