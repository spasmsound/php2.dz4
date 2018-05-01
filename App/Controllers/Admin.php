<?php


namespace App\Controllers;


use App\Controller;
use App\Models\Article;

class Admin extends Controller
{

    protected function actionDefault()
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/admin/index.php');
    }

    protected function actionEdit()
    {
        $this->view->article = Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/admin/edit.php');
    }

    protected function actionSave()
    {
        if(empty($_GET)) {
            $article = new Article();
        } else {
            $article = Article::findById($_GET['id']);
        }
        $article->title = $_POST['title'];
        $article->content = $_POST['content'];
        $article->save();
        header('Location: /admin/');
    }

}