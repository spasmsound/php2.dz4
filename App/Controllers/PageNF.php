<?php


namespace App\Controllers;

use App\Controller;
use App\View;
class PageNF extends Controller
{
    protected function actionDefault()
    {
        $this->view->display(__DIR__ . '/../../templates/404/demo1.html');
    }
}