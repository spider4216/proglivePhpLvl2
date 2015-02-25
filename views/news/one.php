<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подробное описание новости</title>
</head>
<body>
    <div class="news">
        <div class="item-title">
            <h2><?php echo $item->title; ?></h2>
        </div>

        <div class="item-date">
            <p><?php echo $item->date; ?></p>
        </div>

        <div class="item-description">
            <p><?php echo $item->description; ?></p>
        </div>
    </div>
</body>
</html>