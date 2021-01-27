<?php
/**
 * User: monir-dev
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace app\monirdev\phpcore;

use app\monirdev\phpcore\middlewares\BaseMiddleware;
/**
 * Class Controller
 *
 * @author  Monir Hossain <echomonir@gmail.com>
 * @package app\monirdev\phpcore
 */
class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var \app\monirdev\phpcore\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return \app\monirdev\phpcore\middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}