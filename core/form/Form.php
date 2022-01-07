<?php 

namespace app\core\form;
use app\core\Model;

class Form{


    public static function begin($action, $method){

        echo '<form action="'.$action.'" method="'.$method.'">'; 
        return new Form();       
    }

    public static function end(){

        return '</form>';
    }

    public function field(Model $model, $attribute, $type="text", $options=[]){
        return new Field($model, $attribute, $type, $options);
    }

}


?>