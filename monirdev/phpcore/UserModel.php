<?php
/**
 * User: monir-dev
 * Date: 7/25/2020
 * Time: 10:13 AM
 */

namespace app\monirdev\phpcore;

use app\monirdev\phpcore\db\DbModel;

/**
 * Class UserModel
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}