<?php

class NewsController {
    public function actionIndex()
    {
        $items = News::findAll();
        $view = new View();
        $view->news = $items;
        $view->display('news/index.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::findOne($id);

        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }
}

?>