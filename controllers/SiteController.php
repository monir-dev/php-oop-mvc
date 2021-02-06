<?php
/**
 * User: monir-dev
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace app\controllers;


use app\models\Post;
use app\monirdev\phpcore\Application;
use app\monirdev\phpcore\Controller;
use app\monirdev\phpcore\middlewares\AuthMiddleware;
use app\monirdev\phpcore\Request;
use app\monirdev\phpcore\Response;
use app\models\LoginForm;
use app\models\User;

/**
 * Class SiteController
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home()
    {
        $this->title = "Simple Blog";
        $this->header = "OOP PHP MVC blog";
        $this->subheader = "A Blog Theme by Start Bootstrap";

        $posts = Post::get();

        return $this->render('home', [
            'posts' => $posts
        ]);
    }

    public function contact()
    {
        return $this->render('contact');
    }


}