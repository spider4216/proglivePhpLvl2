<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все новости</title>
</head>
<body>
    <h2>Все новости</h2>

    <div class="list-news">
        <table border="1">
            <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Дата</th>
                    <th>Операции</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($news as $item) : ?>
                <tr>
                    <td>
                        <p><a href="/news/one/<?php echo $item->id; ?>"><?php echo $item->title; ?></a></p>
                    </td>
                    <td>
                        <p><?php echo $item->date; ?></p>
                    </td>
                    <td>
                        <p><a href="/admin/edit?id=<?php echo $item->id; ?>">Редактировать</a></p>
                        <p><a href="/admin/list/?delete=<?php echo $item->id; ?>">Удалить</a></p>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <br/>
    </div>
</body>
</html>