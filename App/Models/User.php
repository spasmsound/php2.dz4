<?php

namespace App\Models;

use App\Model;

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{

    public const TABLE = 'users';

    /**
     * @var string $email
     */
    public $email;
    /**
     * @var string $name
     */
    public $name;

}