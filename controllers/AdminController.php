<?php

class AdminController
{
    public function actionIndex()
    {
        include __DIR__ . '/../views/admin/index.php';
    }

    public function actionAddNews()
    {
        if (isset($_POST)) {
            if (!empty($_POST['title']) && !empty($_POST['description'])) {
                if(News::addNews($_POST['title'], $_POST['description'])) {
                    header('Location:/index.php');
                }
            }
        }
        $view = new View();
        $view->display('admin/addnews');
    }
}

?>