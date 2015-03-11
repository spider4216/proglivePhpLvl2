<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Twig test</title>
</head>
<body>

    {% for item in books %}
        <span>{{ item }}</span>
    {% endfor %}

</body>
</html>