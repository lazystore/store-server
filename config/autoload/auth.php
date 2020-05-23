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
return [
    'default' => 'jwt',
    'guards' => [
        'jwt' => [
            'driver' => Qbhy\HyperfAuth\Guard\JwtGuard::class,
            'provider' => 'users',
            'secret' => env('JWT_SECRET', 'qbhy/hyperf-auth'),
        ],
        'session' => [
            'driver' => Qbhy\HyperfAuth\Guard\SessionGuard::class,
            'provider' => 'users',
        ],
    ],
    'providers' => [
        'users' => [
            'driver' => \Qbhy\HyperfAuth\Provider\EloquentProvider::class,
            'model' => App\Model\User::class, //  需要实现 Qbhy\HyperfAuth\Authenticatable 接口
        ],
    ],
];
