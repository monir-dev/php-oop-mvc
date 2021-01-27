<?php
/**
 * User: monir-dev
 * Date: 7/26/2020
 * Time: 3:49 PM
 */

namespace app\monirdev\phpcore\form;


use app\monirdev\phpcore\Model;

/**
 * Class BaseField
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore\form
 */
abstract class BaseField
{

    public Model $model;
    public string $attribute;
    public string $type;

    /**
     * Field constructor.
     *
     * @param \app\monirdev\phpcore\Model $model
     * @param string          $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('<div class="form-group">
                <label>%s</label>
                %s
                <div class="invalid-feedback">
                    %s
                </div>
            </div>',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }

    abstract public function renderInput();
}