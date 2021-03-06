<?php
/**
 * User: monir-dev
 * Date: 7/25/2020
 * Time: 9:36 AM
 */

namespace app\models;


use app\monirdev\phpcore\Application;
use app\monirdev\phpcore\Model;

/**
 * Class LoginForm
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\models
 */
class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules()
    {
        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels()
    {
        return [
            'email' => 'Your Email address',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User does not exist with this email address');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }
}