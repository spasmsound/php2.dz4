<?php

namespace App;

/**
 * Class Model
 * @package App
 */
abstract class Model
{

    public const TABLE = '';

    /**
     * @var string $id
     */
    public $id;

    /**
     * Статичный метод findAll. Возвращает из таблицы БД все данные
     * @return array
     */
    public static function findAll()
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query(
            $sql,
            [],
            static::class
        );
    }

    /**
     * Метод findById. Возврващает из таблицы БД данные по конкретному id
     * @param $id
     * @return bool
     */
    public static function findById($id)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);
        if (empty($data) || $data === false) {
            return false;
        }
        return $data[0];
    }

    /**
     * Вставка данных в БД
     */
    public function insert()
    {
        $fields = get_object_vars($this);
        $cols = [];
        $data = [];
        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            ' (' . implode(',', $cols) . ') 
            VALUES 
        (' . implode(',', array_keys($data)) . ')';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->getLastId();// в связи с тем, что айди при выполнении скрипта не указывается (база данных добавляет его сама), используем возможность PDO этот айди нам показать
    }

    /**
     * Редактирование даных в БД
     * @return bool
     */
    public function update()
    {
        $fields = get_object_vars($this); //получим массив, где ключ - имя свойства, а значение - значение свойства
        $cols = [];
        $data = [];
        foreach ($fields as $name => $value) { //проходимся по массиву fields
            if ('id' !== $name) { // пропускаем айди
                $cols[] = $name . '=:' . $name;   // В cols записываем ключи fields + =: + ключи fields что даст name=:name КРОМЕ id
            }
            $data[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $cols) . ' WHERE id=:id';
        $db = new Db();
        return $db->execute($sql, $data);

    }

    /**
     * Сохранение данных в БД
     * @return bool|void
     */
    public function save()
    {
        if (empty($this->id))
        {
            return $this->insert();
        } else {
            return $this->update();
        }
    }

    /**
     * Удаление данных из БД
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $data = [':id' => $this->id];
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function fill(array $data = [])
    {



    }

}