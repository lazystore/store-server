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
namespace App\Model;

use Qbhy\HyperfAuth\AuthAbility;
use Qbhy\HyperfAuth\Authenticatable;

class User extends Model implements Authenticatable
{
    use AuthAbility;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function getKey()
    {
        return $this->id;
    }
}
