<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    foreach ($this->articles as $value) : ?>
        <a href="/article/one/?id=<?php echo $value->id; ?>"><h1><?php echo $value->title ?></h1></a>
            <?php echo $value->content; ?>

        <?php if (!empty($value->author)) : ?> 
            <h4>Автор: <?php echo $value->author->name; ?></h4>
        <?php else : ?>
            <h4>Без автора</h4>
        <?php endif ?>
        <hr>
   <?php endforeach ?>

</body>
</html>