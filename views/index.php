<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список новостей</title>
</head>
<body>
    <?php foreach($items as $item): ?>
        <div class="news-row">
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
        <hr/>
    <?php endforeach; ?>
</body>
</html>