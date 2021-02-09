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

            if ($this->checkIfFileUploaded($_FILES['image'])
                && $this->checkIfUploadedFileIsAnImage($_FILES['image'])
                && $this->checkIfFileTypeAllowed($_FILES['image'])
            ){
                $fileName = $this->uploadFile($_FILES['image']);
                if ($fileName != "failed") {
                    $post->image = $fileName;
                } else {

                }
            }
            $post->loadData($request->getBody());
            $post->body = htmlentities($post->body);

            if ($post->validate() && $post->save()) {
                Application::$app->session->setFlash('success', 'Post Added Successfully.');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }

        }

        return $this->render('posts/create', [
            'model' => $post
        ]);
    }

    public function view(int $id)
    {

        $post = Post::findOne(['id' => $id]);
        $post->body = html_entity_decode($post->body);

        $this->title = "Simple Blog | {$post->title}";
        $this->header = $post->title;
        $this->headerImage = assets($post->image);

        return $this->render('posts/view', [
            'post' => $post
        ]);
    }

    public function search(Request $request) {
        $searchTerm = $request->getBody()['q'];

    }



    private function checkIfFileUploaded($file): bool
    {
        return !(!isset($file) || $file['error'] == UPLOAD_ERR_NO_FILE);
    }

    private function checkIfUploadedFileIsAnImage($file): bool {
        return getimagesize($file["tmp_name"]) !== false;
    }

    private function checkIfFileTypeAllowed($file): bool {
        $allowedFileTypes = ['jpg','png','jpeg','gif'];
        $ext = $this->getFileExtension($file);
        return in_array($ext,$allowedFileTypes);
    }

    private function uploadFile($file): string {
        $target_dir = "uploads/images/post/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . uniqid("post_",true) .'.'. $this->getFileExtension($file);

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        }

        return "failed";
    }

    private function getFileExtension($file): string {
        return pathinfo($file['name'], PATHINFO_EXTENSION);
    }

}