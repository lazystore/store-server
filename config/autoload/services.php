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
    'consumers' => [
        [
            // The service name, this name should as same as with the name of service provider.
            'name' => 'YourServiceName',
            // The service registry, if `nodes` is missing below, then you should provide this configs.
            'registry' => [
                'protocol' => 'consul',
                'address' => 'Enter the address of service registry',
            ],
            // If `registry` is missing, then you should provide the nodes configs.
            'nodes' => [
                // Provide the host and port of the service provider.
                // ['host' => 'The host of the service provider', 'port' => 9502]
            ],
        ],
    ],
];
