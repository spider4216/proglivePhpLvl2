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

    public function actionLog()
    {
        $path = __DIR__ . '/../core/error.log';
        if (!file_exists($path)) {
            throw new E404Ecxeption('Журнал ошибок не найден');
        }

        $log = file_get_contents($path);
        $view = new View();
        $view->log = $log;
        $view->display('admin/log.php');
    }

}

?>