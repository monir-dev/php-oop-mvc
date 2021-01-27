<?php
/**
 * User: monir-dev
 * Date: 7/25/2020
 * Time: 11:35 AM
 */

namespace app\monirdev\phpcore\exception;


use app\monirdev\phpcore\Application;

/**
 * Class ForbiddenException
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}