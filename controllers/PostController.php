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
class PostController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function create(Request $request)
    {
        $this->title = "Simple Blog | Create Post";
        $this->header = 'Create Post Form';

        $post = new Post();

        if ($request->getMethod() === 'post') {
            $post->loadData($request->getBody());
            if ($post->validate() && $post->save()) {
                Application::$app->session->setFlash('success', 'Post Added Successfully.');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }

        }



        return $this->render('posts/create', [
            'post' => $post
        ]);
    }

    public function view(int $id)
    {

        $post = Post::findOne(['id' => $id]);

        $this->title = "Simple Blog | {$post->title}";
        $this->header = $post->title;

        return $this->render('posts/view', [
            'model' => $post
        ]);
    }


}