<?php

namespace App\Controllers;

use App\Controller;
use App\PageNFException;
use App\View;

class Article extends Controller
{

    public function actionOne()
    {
        $article = \App\Models\Article::findById($_GET['id']);
        if(false == $article) {
            throw new PageNFException();
        }
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}