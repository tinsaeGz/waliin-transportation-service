<?php


namespace app\core\form;
use app\core\Model;


class Field{
    public Model $model;
    public string $attribute;
    public function __construct(Model $model, $attribute){
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString(){
        $label = ucfirst(preg_replace('/([A-Z])/', ' $1', $this->attribute));
        return sprintf('
                <div class="form-group">
                    <label>%s</label>
                    <input type="text" name="%s" value="%s" class="form-control%s">
                    <div class="invalid-feedback">
                        %s
                    </div>
                </div>
            ', 
                $label, 
                $this->attribute,
                $this->model->{$this->attribute},
                $this->model->hasError($this->attribute) ? ' is-invalid' : '',
                $this->model->getError($this->attribute)
            );
    } 
}

?>