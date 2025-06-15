<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: https://final.local/404");
    }

    require_once realpath('Functions/processing/create_offer.php');
    require_once realpath('Application/Core/request_protection.php');

	$request = new RequestProtection;
?>
<!-- -->
<p>Заполните все поля</p>
<div>
    <form method="post">
        <input type="hidden" name="csrf_token" value="<?echo $request->previous_hash?>"/>
        <p>Название:<input type="text" name="offer_name"></p><!--Название оффера-->
        <p>Описание<textarea name="about" rows="5" cols="30"></textarea></p><!--Описание оффера-->
        <p>Цена за переход:<input type="text" name="price">руб.</p><!--Цена за переход-->
        <p>Ссылка:<input type="text" name="url"></p><!--Цена за переход-->
        <button type="submit" name="create">Создать</button><!--Создать оффер-->
    </form>
</div>