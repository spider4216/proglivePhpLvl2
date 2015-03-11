<?php

namespace Application\Controllers;

use Application\Models\News;
use Application\Classes\View;
use Application\Classes\E404Exception;
use Application\Classes\EmailException;

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
                    $mail = new \PHPMailer();
                    $mail->addAddress('spider4216@gmail.com', 'farZa');
                    $mail->Subject = 'Добавление новой новости';
                    $mail->Body    = 'На сайт была добавлено новая новость';

                    if(!$mail->send()) {
                        throw new EmailException('Произошла ошибка при отправки email сообщения');
                    }
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
            throw new E404Exception('Журнал ошибок не найден');
        }

        $log = file_get_contents($path);
        $view = new View();
        $view->log = $log;
        $view->display('admin/log.php');
    }

    public function actionSpeed()
    {
        $timer = new \PhpTimer();
        $timer->start('cycle');

        for ($i = 0; $i < 100000; $i++) {
            $a *= $i;
        }

        $timer->stop('cycle');

        for ($i = 0; $i < 10; $i++) {
            $timer->start("subloop");
            for ($j = 0; $j < 1000000; $j++) $a = $i * $j;
            $timer->stop("subloop");
        }
        $result = $timer->getAll();

        $view = new View();
        $view->humanSpeed = $result['subloop']['average_human'];
        $view->display('admin/speed.php');
    }

}

?>