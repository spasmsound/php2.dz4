<?php

namespace App\Models;

use App\Db;
use App\Model;

/**
 * Модель новостей
 * Class Article
 * @package App\Models
 */
class Article extends Model
{

    public const TABLE = 'news';

    /**
     * @var string $title
     */
    public $title;
    /**
     * @var string $content
     */
    public $content;
    /**
     * @var string $author_id
     */
    public $author_id;

    /**
     * Возвращает три последние новости в обратном порядке
     * @return array
     */
    public static function findLastArticles()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER bY id DESC LIMIT 3';
        return $db->query($sql, [], static::class);
    }

    /**
     * Принимает имя несуществующего свойства author и возвращает автора по author_id
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        if ('author' == $name) {
            return Author::findById($this->author_id);
        }
    }

    /**
     * Принимает имя несуществующего свойства author и проверяет его
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        if ('author' == $name) {
            return isset($this->author_id);
        }
    }

}