<?php
/**
 * User: monir-dev
 * Date: 7/8/2020
 * Time: 8:56 AM
 */

namespace app\controllers;


use app\monirdev\phpcore\Controller;

/**
 * Class AboutController
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\controllers
 */
class AboutController extends Controller
{
    public function index()
    {
        return $this->render('about');
    }
}