<?php


namespace App;

/**
 * Trait MagicTrait
 * @package App
 */
trait MagicTrait
{
    /**
     * @var array
     */
    protected $data = [];
    /**
     * Магический метод на чтение условного свойства
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * магический метод на запись условного свойства
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * магический метод на запись условного свойства
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

}