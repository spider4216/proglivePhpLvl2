<?php

require_once __DIR__ . '/models/News.php';

$items = News::findAll();

require_once __DIR__ . '/views/index.php';

?>