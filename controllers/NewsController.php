<?php

namespace Application\Controllers;

use Application\Models\News;
use Application\Classes\View;
use Application\Classes\E404Exception;

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
            throw new E404Exception('Страница не найдена');
        }

        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }

    public function actionTwig()
    {
        //Тестирую Twig
        global $twig;

        $items = ['a' => 1, 'b' => 2, 'c' => 3];
        echo $twig->render('news/twigtest.php', array('books' => $items));


    }

}

?>