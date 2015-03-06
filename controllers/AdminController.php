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

                if($model->save()) {
                    header('Location:/index.php');
                }
            }
        }
        $view = new View();
        $view->display('admin/addnews.php');
    }

}

?>