<?php

class NewsController {
    public function actionIndex()
    {
        $items = News::findAll();
        include __DIR__ . '/../views/news/index.php';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::findOne($id);
        include __DIR__ . '/../views/news/one.php';
    }
}

?>