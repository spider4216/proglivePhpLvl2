<?php

class NewsController {
    public function actionAll()
    {
        $items = News::findAll();
        include __DIR__ . '/../views/news/all.php';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::findOne($id);
        include __DIR__ . '/../views/news/one.php';
    }
}

?>