<?php
/**
 * User: monir-dev
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace app\monirdev\phpcore\middlewares;


/**
 * Class BaseMiddleware
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore
 */
abstract class BaseMiddleware
{
    abstract public function execute();
}