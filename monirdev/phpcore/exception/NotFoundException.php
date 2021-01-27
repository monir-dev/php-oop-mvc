<?php
/**
 * User: monir-dev
 * Date: 7/25/2020
 * Time: 11:43 AM
 */

namespace app\monirdev\phpcore\exception;


/**
 * Class NotFoundException
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore\exception
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}