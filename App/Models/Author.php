<?php


namespace App\Models;


use App\Model;

/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{

    public const TABLE = 'authors';
    /**
     * @var string $name
     */
    public $name;

}