<?php

namespace App\Controllers;

use App\Controller;
use App\View;

class Article extends Controller
{

    public function actionOne()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}