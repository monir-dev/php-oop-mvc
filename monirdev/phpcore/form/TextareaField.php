<?php
/**
 * User: monir-dev
 * Date: 7/26/2020
 * Time: 3:49 PM
 */

namespace app\monirdev\phpcore\form;


/**
 * Class TextareaField
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore\form
 */
class TextareaField extends BaseField
{
    public function renderInput()
    {
        return sprintf('<textarea class="form-control%s" name="%s">%s</textarea>',
             $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }
}