<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Блог</title>
    <link href="../templates/CSS/main.css" rel="stylesheet">
</head>
<body>
<?php
$new
?>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td>
        <?php foreach ($articles as $article): ?>
        <h2><a href="articles/<?= $article->getId() ?>"> <?= $article->getName() ?></a></h2>
        <p><?= $article->getText() ?></p>
        <p>Автор: <?= $article->getAuthor()->getNickname()?></p>
        <hr>
        <?php endforeach; ?>
        </td>

        <td width="300px" class="sidebar">
            <div class="sidebarHeader">Меню</div>
            <ul>
                <li><a href="/">Главная страница</a></li>
                <li><a href="/about-me">Обо мне</a></li>
            </ul>
        </td>
    </tr>
    <tr>
        <td class="footer" colspan="2">Все права защищены (c) Мой блог</td>
    </tr>
</table>

</body>
</html>
