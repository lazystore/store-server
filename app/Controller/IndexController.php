<?php

declare(strict_types=1);
/**
 * This file is part of lazystore.
 *
 * @link     https://github.com/lazystore/store-server
 * @document https://github.com/lazystore/store-server/blob/master/README.md
 * @contact  qbhy0715@qq.com
 * @license  https://github.com/lazystore/store-server/blob/master/LICENSE
 */
namespace App\Controller;

use App\Middleware\ExampleMiddleware;
use App\Model\User;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Request;
use Qbhy\Auth\AuthManager;

/**
 * @Controller
 * @Middleware(ExampleMiddleware::class)
 * Class IndexController
 */
class IndexController extends AbstractController
{
    /**
     * @Inject
     * @var AuthManager
     */
    protected $auth;

    /**
     * @return array
     */
    public function index(Request $request)
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    /**
     * @GetMapping(path="/login")
     * @return array
     */
    public function login()
    {
        /** @var User $user */
        $user = User::query()->firstOrCreate(['name' => 'text', 'avatar' => 'avatar']);
        return [
            'token' => $this->auth->driver()->login($user),
        ];
    }

    /**
     * @GetMapping(path="/user")
     * @return string
     */
    public function user()
    {
        $user = $this->auth->driver()->user();
        return $user ? $user->name : '未登录';
    }
}
