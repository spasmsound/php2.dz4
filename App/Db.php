<?php

namespace App;

use App\Models\Config;

/**
 * Class Db
 * @package App
 */
class Db
{
    /**
     * @var \PDO
     */
    protected $dbh;
    /**
     * @var mixed
     */
    protected $cfg;
    /**
     * @var string
     */
    protected $dsn;

    /**
     * Db constructor.
     */
    public function __construct()
    {

        $this->cfg = new Config();
        $this->dsn = 'mysql:host=' . $this->cfg->data['db']['host'] . ';dbname=' . $this->cfg->data['db']['dbname'];
        $this->dbh = new \PDO($this->dsn, $this->cfg->data['db']['username'], $this->cfg->data['db']['password']);
    }

    /**
     * Метод query. Принимает sql-запрос, данные для подстановки, имя класса. Возврващает массив объектов из БД
     * @param $sql
     * @param array $data
     * @param $class
     * @return array
     */
    public function query($sql, $data=[], $class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * Метод execute. Принимает sql-запрос, данные для подстановок. Выполняет запрос в БД
     * @param $sql
     * @param array $data
     * @return bool
     */
    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);

    }

    /**
     * Метод getLastId. Возвращает последний вставленный айди
     * @return string
     */
    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }


}