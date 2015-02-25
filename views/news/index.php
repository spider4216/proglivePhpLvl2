<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список новостей</title>
</head>
<body>
    <div class="news">
        <?php foreach($items as $item): ?>
            <div class="news-row">
                <div class="item-title">
                    <a href="/index.php?ctrl=News&act=one&id=<?php echo $item->id; ?>">
                        <?php echo $item->title; ?>
                    </a>
                </div>

                <div class="item-date">
                    <p><?php echo $item->date; ?></p>
                </div>

                <div class="item-description">
                    <p><?php echo $item->description; ?></p>
                </div>
            </div>
            <hr/>
        <?php endforeach; ?>
    </div>
</body>
</html>