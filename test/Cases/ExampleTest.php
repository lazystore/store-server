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
namespace HyperfTest\Cases;

use Hyperf\Redis\Redis;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class ExampleTest extends HttpTestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
//        $this->assertTrue(is_array($this->get('/')));
    }

    public function testRedis()
    {
        $redis = make(Redis::class);
        var_dump($redis->set('a', 'xxx'));
        var_dump($redis->get('a'));
        $this->assertTrue(true);
    }
}
