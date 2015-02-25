<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить новость</title>
</head>
<body>
    <div class="add-news-panel">
        <h2>Добавление новости</h2>
        <form action="/index.php?ctrl=admin&act=addNews" method="post">
            <div class="title-field">
                <label for="title">Заголовок</label>
                <input type="text" name="title" id="title"/>
            </div>
            <div class="description-field">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="22" rows="10" "></textarea>
            </div>
            
            <input type="submit" value="Добавить"/>
        </form>
    </div>
</body>
</html>