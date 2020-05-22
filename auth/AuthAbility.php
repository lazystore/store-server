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
namespace Qbhy\Auth;

use Hyperf\Database\Model\Model;

/**
 * Trait AuthAbility.
 * @mixin Authenticatable|Model
 */
trait AuthAbility
{
    public static function findFromKey(string $key): ?Authenticatable
    {
        /** @var null|Authenticatable|Model $user */
        return self::query()->find($key);
    }
}
