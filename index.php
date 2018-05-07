<?php

require __DIR__ . '/App/autoload.php';


$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($uri, '/'));

$ctrl = $parts[0] ? ucfirst($parts[0]) : 'Index';

$action = $parts[1] ?: 'Default';
try {
    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class;
    $ctrl->action($action);
} catch (\App\DbException $error) {
    echo 'Ошибка в БД: ' . $error->getMessage();
    die;
} catch (\App\PageNFException $error) {
    $action = 'Default';
    $class = '\App\Controllers\PageNF';
    $ctrl = new $class;
    $ctrl->action($action);
} catch (Exception $error) {
    echo 'Неизвестная ошибка';
    die;
}