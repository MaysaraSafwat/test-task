<?php

use Pecee\SimpleRouter\SimpleRouter;


  
//   SimpleRouter::group(['prefix' => '/scandiweb-test-task/server/'], function () {
//     SimpleRouter::get('products', function ()    {
//        try {
//         $product = new Book();
//         $products = $product->get_all_products();
//         echo json_encode($products);
//         }catch(Exception $e){
//             http_response_code(500);
//             echo"something went wrong".$e;
//         }
//     });

//     SimpleRouter::post('products/{type}' , function($type){
//         //create new product
//         try {
//             $data = (array) json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
//             $product =  ProductType::get_product_instance($type);
//             $product->save($data);
//         }catch(Exception $e){
//             http_response_code(500);
//             echo"something went wrong".$e;
//         }
//     });

//     SimpleRouter::post('products' , function(){
//         //mass delete products
//         try {
//             $data = (array) json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
//             $product = new Book();
//             $res= $product->mass_delete_products($data);
//             http_response_code(200);
//             echo "Records Deleted Successfully";
//         }catch(Exception $e){
//             http_response_code(500);
//             echo"something went wrong".$e;
//         }
//          });
// });



  
  SimpleRouter::group(['prefix' => '/'], function () {
    // SimpleRouter::get(' ', function ()    {
    //     try {
    //          $response = array("message"=>"hello there");
    //          return json_encode($response);
    //      }catch(Exception $e){
    //          http_response_code(500);
    //          $response = array("message"=>"something went wrong".$e);
    //          return $response;
    //      }
    //  });

    SimpleRouter::get('products', function ()    {
       try {
            $product = new Book();
            $products = $product->get_all_products();
            $response = array("message"=>"List Data", "data"=>$products);
            return json_encode($response);
        }catch(Exception $e){
            http_response_code(500);
            $response = array("message"=>"something went wrong".$e);
            return $response;
        }
    });

    SimpleRouter::post('products/{type}' , function($type){
        //create new product
        try {
            $data = (array) json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
            $product =  ProductType::get_product_instance($type);

            //TOOD:Validate the product here before saving.
            

            $product->save($data);
            http_response_code(201);
            $response = array("message"=>"Product Added");
            return json_encode($response);
        }catch(Exception $e){
            http_response_code(500);
            $response = array("message"=>"something went wrong".$e);
            return json_encode($response);
        }
    });

    SimpleRouter::post('products' , function(){
        //mass delete products
        try {
            $data = (array) json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
            $product = new Book();
            $res= $product->mass_delete_products($data);
            http_response_code(204);
            $response = array("message"=>"Products Deleted");
            return json_encode($response);
        }catch(Exception $e){
            http_response_code(500);
            $response = array("message"=>"something went wrong".$e);
            return json_encode($response);
        }
         });
});