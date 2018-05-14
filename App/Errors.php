<?php


namespace App;


class Errors extends \Exception
{

    protected $errors = [];

    public function add(\Exception $e)
    {
        $this->errors[] = $e;
    }

    public function all()
    {
        return $this->errors;
    }

    public function isEmpty()
    {
        return empty($this->errors);
    }

}