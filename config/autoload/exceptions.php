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
    'handler' => [
        'http' => [
            App\Exception\Handler\AppExceptionHandler::class,
            Hyperf\ExceptionHandler\Handler\WhoopsExceptionHandler::class,
            Qbhy\HyperfAuth\AuthExceptionHandler::class,
        ],
    ],
];
