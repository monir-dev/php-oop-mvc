<?php
/**
 * User: monir-dev
 * Date: 7/26/2020
 * Time: 2:45 PM
 */

namespace app\monirdev\phpcore;


/**
 * Class View
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore
 */
class View
{
    public string $title = '';
    public string $header = '';
    public string $subheader = '';
    public string $headerImage = '';

    public function renderView($view, array $params)
    {
        $layoutName = Application::$app->layout;
        if (Application::$app->controller) {
            $layoutName = Application::$app->controller->layout;

            // set page properties
            $this->title = Application::$app->controller->title;
            $this->header = Application::$app->controller->header;
            $this->subheader = Application::$app->controller->subheader;
            $this->headerImage = Application::$app->controller->headerImage;
        }
        $viewContent = $this->renderViewOnly($view, $params);
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layoutName.php";
        $layoutContent = ob_get_clean();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderViewOnly($view, array $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}