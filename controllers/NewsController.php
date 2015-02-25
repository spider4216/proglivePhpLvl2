<?php

class NewsController {
    public function actionIndex()
    {
        $items = News::findAll();
        $view = new View();
        $view->data('news', $items);
        $view->display('news/index');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::findOne($id);

        $view = new View();
        $view->data('item', $item);
        $view->display('news/one');
    }
}

?>