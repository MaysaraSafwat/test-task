<?php
abstract class Product {
        //DB
        protected $db;

        //Member vars
        protected $id;
        protected $sku;
        protected $name;
        protected $price;
        protected $product_type;
        protected $product_specifications;

        public function __construct()
        {
            $this->db =  new MYSQLHandler("products");
        }
      
        public function getId() {
          return $this->id;
        }
      
        public function setId($id) {
          $this->id = $id;
        }
      
        public function getSku() {
          return $this->sku;
        }
      
        public function setSku($sku) {
          $this->sku = $sku;
        }
      
        public function getName() {
          return $this->name;
        }
      
        public function setName($name) {
          $this->name = $name;
        }
      
        public function getPrice() {
          return $this->price;
        }
      
        public function setPrice($price) {
          $this->price = $price;
        }
      
        public function getProductType() {
          return $this->product_type;
        }
      
        public function setProductType($product_type) {
          $this->product_type = $product_type;
        }
      
        public function getProductSpecifications() {
          return $this->product_specifications;
        }
      
        public function setProductSpecifications($product_specifications) {
          $this->product_specifications = $product_specifications;
        }

        public  function get_all_products(){
          $products = $this->db->get_all();
         return $products;
        }

        public function mass_delete__products($ids){
          return $this->db->mass_delete($ids);
        }


        abstract public function save($data);
        
      
}