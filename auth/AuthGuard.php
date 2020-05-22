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

abstract class AuthGuard extends Driver
{
    abstract public function login(Authenticatable $user);

    abstract public function user(): ?Authenticatable;

    abstract public function check(): bool;

    abstract public function logout();
}
