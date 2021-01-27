<?php
/**
 * User: monir-dev
 * Date: 7/9/2020
 * Time: 7:05 AM
 */

namespace app\monirdev\phpcore\form;


use app\monirdev\phpcore\Model;

/**
 * Class Form
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package phpcore\form
 */
class Form
{
    public static function begin($action, $method, $options = [])
    {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "$key=\"$value\"";
        }
        echo sprintf('<form action="%s" method="%s" %s>', $action, $method, implode(" ", $attributes));
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }

}