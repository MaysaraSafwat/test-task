<?php
abstract class ProductValidation
{
    protected $errors = [];
    private $sku;
    private $name;
    private $price;
    private $product_type;
    private $product_specifications;
    
   

    public function __construct($sku, $name,$price, $product_type,$product_specifications)
    {

        $this->sku = $sku ? $sku : "";
        $this->name= $name? $name: "";
        $this->price= $price? $price: 0;
        $this->product_type = $product_type ? $product_type : "";
        $this->product_specifications = $product_specifications ? $product_specifications : "";
       
    }

    private function validate_name($name)
    {
        if (empty($name)) {
            array_push($this->errors, " Name Can't Be Empty");
        } elseif (strlen($name) < NAME_MIN_LENGTH) {
            array_push($this->errors, "Name Should Be More Than " . NAME_MIN_LENGTH . " characters");
        }
    }
    private function validate_type($type)
    {
       if(!in_array($type, PRODUCT_TYPES)){
        array_push($this->errors, "Invalid Product Type");
       }
      
    }
    private function validate_sku($sku)
    {
       if(empty($sku)){
        array_push($this->errors, "SKU Can't Be Empty");
       }
      
    }

    abstract public function validate_specifications($spc);
 
 
    
 
    private function validate_creating_group()
    {
        $this->validate_sku($this->sku);
        $this->validate_name($this->name);
        $this->validate_type($this->product_type);
        $this->validate_specifications($this->product_specifications);
    
        //$this->validate_groupImage($this->groupIcon);
        // return $this->;
    }
    public function get_errors()
    {
        $this->validate_creating_group();
        return $this->errors;
    }

    public function create_product_data()
    {
        if (empty($this->get_errors())) {
            return [
                "sku" => $this->sku,
                "name" => $this->name,
                "price"=>$this->price,
                "product_type" => $this->product_type,
                "product_specifications" => $this->product_specifications
            ];
        }
    }
}
