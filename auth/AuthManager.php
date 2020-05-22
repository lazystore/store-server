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

use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\ContainerInterface;

/**
 * Class AuthManager.
 */
class AuthManager extends DriverManager
{
    protected $config;

    public function __construct(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $this->config = $config->get('auth');
    }

    public function __call($name, $arguments)
    {
        $driver = $this->driver($this->defaultDriver());

        if (method_exists($driver, $name)) {
            return call_user_func_array([$driver, $name], $arguments);
        }

        throw new \ErrorException("method {$name} is not defined");
    }

    /**
     * @return AuthGuard
     */
    public function driver(?string $name = null): Driver
    {
        $name = $name ?? $this->defaultDriver();
        $guardConfig = $this->config['guards'][$name] ?? [];
        return $this->drivers[$name] ?: $this->drivers[$name] = make($guardConfig['driver'], [$guardConfig]);
    }

    public function defaultDriver(): string
    {
        return $this->config['default'] ?? $this->defaultDriver;
    }
}
