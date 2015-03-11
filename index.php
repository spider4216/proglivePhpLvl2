<?php

use Application\Classes\View;
use Application\Classes\E404Exception;
use Application\Classes\Log;
use Application\Classes\EmailException;

require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = (!empty($pathParts[1]) && $pathParts[1] != 'index.php') ? $pathParts[1] : 'News';
$act = !empty($pathParts[2]) ? $pathParts[2] : 'Index';

$controllerClassName = $ctrl . 'Controller';
$controllerPath = __DIR__ . '/controllers/' . $controllerClassName . '.php';

//Громозкий получился try catch. Увы не уверен как в данном случае сделать более элегантно,
//чтобы исключения выбрасывались при остуствии контроллера
try {
    try {
        if (!file_exists($controllerPath)) {
            throw new E404Exception('Контроллер не найден');
        }
        require_once $controllerPath;

        $controllerClassName = 'Application\\Controllers\\' . $controllerClassName;
        $controller = new $controllerClassName;

        $method = 'action' . $act;
        $controller->$method();

    } catch (E404Exception $e) {

        $view = new View();
        $view->error = $e->getMessage();

        header("HTTP/1.0 404 Not Found");
        $view->display('errors/404.php');
        //логирование 404
        throw new Log($e->getMessage());

    } catch (PDOException $e) {

        $view = new View();
        $view->error = 'Ошибка выполнения запроса: ' . $e->getMessage();

        header('HTTP/1.0 403 Forbidden');
        $view->display('errors/403.php');
        //логирование 403
        throw new Log($e->getMessage());

    } catch (EmailException $e) {
        //логирование ошибки отправки email сообщения
        throw new Log($e->getMessage());

    }
} catch (Log $e) {
    $e->write();
}


?>