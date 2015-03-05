<?php

class AdminController
{
    public function actionIndex()
    {
        $view = new View();
        $view->display('admin/index.php');
    }

    public function actionAddNews()
    {
        if (isset($_POST)) {
            if (!empty($_POST['title']) && !empty($_POST['description'])) {
                $model = new News();
                $model->title = $_POST['title'];
                $model->description = $_POST['description'];

                if($model->insert()) {
                    header('Location:/index.php');
                }
            }
        }
        $view = new View();
        $view->display('admin/addnews.php');
    }

    public function actionList()
    {
        if (!empty($_GET['delete'])) {
            $item = News::findByPk($_GET['delete']);
            $item->delete();
            header('Location:/admin/list');
        }
        $model = new News();
        $news = $model->findAll();

        $view = new View();
        $view->news = $news;
        $view->display('news/list.php');
    }
}

?>