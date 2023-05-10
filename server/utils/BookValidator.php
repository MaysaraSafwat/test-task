<?php 
class BookValidation extends ProductValidation {
    public function validate_specifications($spc){
       if(!array_key_exists("weight", $spc)){
        array_push($this->errors, "Must Specify the Weight of the book");
       }
    }
}