<?php 
class FurnitureValidation extends ProductValidation {
    public function validate_specifications($spc){
       if(!array_key_exists("dimensions", $spc)){
        array_push($this->errors, "Must Specify the Dimensions of the Furniture");
       }
    }
}