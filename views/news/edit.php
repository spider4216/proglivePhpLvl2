<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница редактирования</title>
</head>
<body>
    <h2>Редактировать</h2>
    <div class="edit-news">
        <form action="/admin/edit" method="post">
            <div class="title">
                <p><label for="title">Заголовок</label></p>
                <input type="text" name="title" size="50" value="<?php echo $news->title; ?>" />
            </div>

            <div class="description">
                <p><label for="description">Описание</label></p>
                <textarea name="description" id="description" cols="50" rows="10"><?php echo $news->title; ?></textarea>
            </div>

            <input type="hidden" value="<?php echo $news->id; ?>" name="news_id" />
            <input type="submit" value="Сохранить" />
        </form>
    </div>
</body>
</html>