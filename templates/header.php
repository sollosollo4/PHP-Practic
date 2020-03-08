<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <link rel="stylesheet" href="/PHP-Practic/templates/CSS/main.css"> -->
    <link rel="stylesheet" href="/PHP-Practic/templates/CSS/style.css">
    
    <title>Document</title>
</head>
<body>
    <table class="layout">
            <tr>
                <td colspan="2" class="header">
                    Мой блог
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right">
                    <?php
                        if(!empty($user)){
                            echo 'Привет, <b>' . $user->getNickname() . '</b> | ';
                            echo '<a href="/PHP-Practic/www/user/logout">Выйти</a>';
                        }else{
                            echo '<a href="/PHP-Practic/www/users/login">Войти</a> | ';
                            echo '<a href="/PHP-Practic/www/users/register">Регистрация</a>';
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>