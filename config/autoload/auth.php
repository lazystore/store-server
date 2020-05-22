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
    // 默认驱动
    'default' => 'jwt',

    /*
     * 支持的驱动，用户可以自己添加驱动
     */
    'guards' => [
        'jwt' => [
            'driver' => Qbhy\Auth\Jwt\JwtGuard::class,
            'secret' => env('JWT_SECRET', 'qbhy/hyperf-auth'),
            'model' => \App\Model\User::class,
        ],
    ],
];
