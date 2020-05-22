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
namespace Qbhy\Auth\Jwt;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\Str;
use Qbhy\Auth\Authenticatable;
use Qbhy\Auth\AuthGuard;
use Qbhy\SimpleJwt\JWTManager;

class JwtGuard extends AuthGuard
{
    /**
     * @var JWTManager
     */
    protected $jwtManager;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * JwtGuard constructor.
     */
    public function __construct(array $config, RequestInterface $request)
    {
        $this->jwtManager = new JWTManager($config['secret'] ?? 'secret');
        $this->config = $config;
        $this->request = $request;
    }

    public function parseToken()
    {
        $header = $this->request->header('Authorization', '');
        if (Str::startsWith($header, 'Bearer ')) {
            return Str::substr($header, 7);
        }

        if ($this->request->has('token')) {
            return $this->request->input('token');
        }

        return null;
    }

    public function login(Authenticatable $user)
    {
        return $this->jwtManager->make(['uid' => $user->getKey()])->token();
    }

    public function user(): ?Authenticatable
    {
        if ($token = $this->parseToken()) {
            $jwt = $this->jwtManager->parse($token);
            $uid = $jwt->getPayload()['uid'] ?? null;
            return $uid ? call_user_func_array([$this->config['model'], 'findFromKey'], [$uid]) : null;
        }

        return null;
    }

    public function check(): bool
    {
        return $this->user() instanceof Authenticatable;
    }

    public function logout()
    {
    }
}
