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
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Qbhy\HyperfAuth\Annotation\Auth;
use Qbhy\HyperfAuth\AuthManager;

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
     * @Inject
     * @var ValidatorFactoryInterface
     */
    protected $validator;

    /**
     * @GetMapping(path="/test")
     */
    public function validate(Request $request)
    {
        $v = $this->validator->make($request->all(), [
            'id' => 'required',
        ]);

        return $v->errors();
    }

    /**
     * @GetMapping(path="/")
     */
    public function index(): array
    {
        $method = $this->request->getMethod();

        $user = $this->auth->guard('session')->user();

        return [
            'method' => $method,
            'user' => $user ? $user->name : 'no login',
        ];
    }

    /**
     * @GetMapping(path="/login")
     * @return array
     */
    public function login()
    {
        /* @var User $user */
        User::query();
        $user = User::query()->firstOrCreate(['name' => 'text', 'avatar' => 'avatar']);
        return [
            'token' => $this->auth->guard()->login($user),
        ];
    }

    /**
     * @GetMapping(path="/logout")
     */
    public function logout()
    {
        $this->auth->guard()->logout();
        return 'logout ok';
    }

    /**
     * @Auth
     * @GetMapping(path="/user")
     * @return string
     */
    public function user()
    {
        $user = $this->auth->guard()->user();
        return $user ? $user->name : 'no login';
    }
}
