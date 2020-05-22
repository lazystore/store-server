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

abstract class DriverManager
{
    /**
     * @var string
     */
    protected $defaultDriver = 'default';

    /**
     * @var array
     */
    protected $drivers;

    public function defaultDriver(): string
    {
        return $this->defaultDriver;
    }

    abstract public function driver(?string $name = null): Driver;
}
