<?php

use Application\Models\News;
use Application\Classes\View;

class NewsController {
    public function actionIndex()
    {
        $news = News::findAll();
        $view = new View();
        $view->news = $news;
        $view->display('news/index.php');

    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::findByPk($id);
        if (empty($item)) {
            throw new E404Ecxeption('Страница не найдена');
        }

        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }

}

?>