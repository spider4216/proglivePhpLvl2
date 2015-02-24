<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подробное описание новости</title>
</head>
<body>
<div class="news">
    <div class="item-title">
        <?php echo $item->title; ?>
    </div>

    <div class="item-date">
        <?php echo $item->date; ?>
    </div>

    <div class="item-date">
        <?php echo $item->description; ?>
    </div>
</div>
</body>
</html>