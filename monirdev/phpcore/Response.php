<?php
/**
 * User: monir-dev
 * Date: 7/7/2020
 * Time: 10:53 AM
 */

namespace app\monirdev\phpcore;


/**
 * Class Response
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore
 */
class Response
{
    public function statusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}