<?php 
class DvdValidation extends ProductValidation {
    public function validate_specifications($spc){
       if(!array_key_exists("size", $spc)){
        array_push($this->errors, "Must Specify the Size of the DVD");
       }
    }
}