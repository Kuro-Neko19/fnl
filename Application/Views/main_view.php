<?php
    session_start();

    require realpath('vendor/autoload.php');

spl_autoload_extensions(".php");
spl_autoload_register();

    $connect = new Processing\Distribution;
    $connect->connectDistribution();

?>

<h1>SF-AdTech</h1> 
<h3>Сервис для продвижения рекламы.</h3>

<p>Для того что бы воспользоваться функционалом сервиса, пожалуйста, авторизируйтесь.</p>

<div class="">
    <form method="post">
        <div id="">
            <p>Я рекламодатель!</p>
            <button id="" name="advertiser_auth" type="submit">Авторизироваться как рекламодатель</button>
        </div>

        <div id="">
            <p>Я веб-мастер!</p>
            <button id="" name="master_auth" type="submit">Авторизироваться как веб-мастер</button>
        </div>
    </form>
</div>

<div>
    <form method="post">
        <p>Я персонал сервиса!</p>
        <button id="" name="admin_login" type="submit">Войти</button>
    </form>
</div>
