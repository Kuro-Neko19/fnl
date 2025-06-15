<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: https://final.local/404");
    }
    
    require_once realpath('Functions/processing/offers.php');
    require_once realpath('Application/Core/request_protection.php');

	$request = new RequestProtection;

    if(!isset($_GET['id'])){
        header("Location: https://final.local/offers");
    }

?>
<!-- -->
<div>
    <p><?echo $public_name?></p><!--Название оффера-->
</div>
<div>
    <p></p><!--Владелец оффера-->
</div>

<div><!--Описание оффера-->
    <p>Описание:</p>
    <p><?echo $public_about?></p>
</div>

<div><!--Ссылка-->

</div>

<div>
    <p>Цена за переход: <?echo $public_price?> руб.</p><!--Цена перехода-->
    <p><?echo $public_sub?></p><!--Количество подписавшихся-->
</div>

<?
    if($_SESSION['usr_type'] == 'master'){
        if($rdrct_url !== null){
            print(
                '<p>Ваша ссылка для встраивания: ' . $rdrct_url . '</p>'
            );
        }
    }
?>


<form method="post">
    <div>

        <input type="hidden" name="csrf_token" value="<?echo $request->previous_hash?>"/>
        <div>
            <button type="submit" name="subscribe">Подписаться</button>
        </div>

        <div>
            <button type="submit" name="unsubscribe">Отписаться</button>
        </div>

        <div>
            <button type="submit" name="edit">Редактировать</button>
        </div>

    </div>
</form>