<?php
/**
 * User: monir-dev
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace app\monirdev\phpcore\middlewares;


use app\monirdev\phpcore\Application;
use app\monirdev\phpcore\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore
 */
class AuthMiddleware extends BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}