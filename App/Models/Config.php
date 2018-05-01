<?php

namespace App\Models;


class Config
{

    public $data;

    public function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }
}