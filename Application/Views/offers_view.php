<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: https://final.local/404");
    }

    require_once realpath('Functions/processing/offers.php');
    require_once realpath('Application/Core/request_protection.php');

	$request = new RequestProtection;

    $itr = 0;
?>
<!-- -->
<form method="post">
    <input type="hidden" name="csrf_token" value="<?echo $request->previous_hash?>"/>
    <?
    do{
    print('<div>
        <button type="submit" value="' . $itr . '" name="offer_butt"><!--Кнопка с оффером-->
            <p>' . $offername[$itr] .'</p><!--Название оффера-->
            <div>
                <p>' . $offerprice[$itr] .' руб.</p><!--Цена перехода-->
                <p></p><!--Количество подписавшихся-->
            </div>
        </button>
    </div>');
    
    print('<div>
        <button type="submit" value="' . $itr + 1 . '" name="offer_butt"><!--Кнопка с оффером-->
            <p>' . $offername[$itr + 1] .'</p><!--Название оффера-->
            <div>
                <p>' . $offerprice[$itr + 1] .' руб.</p><!--Цена перехода-->
                <p></p><!--Количество подписавшихся-->
            </div>
        </button>
    </div>');

    print('<div>
        <button type="submit" value="' . $itr + 2 . '" name="offer_butt"><!--Кнопка с оффером-->
            <p>' . $offername[$itr + 2] .'</p><!--Название оффера-->
            <div>
                <p>' . $offerprice[$itr + 2] .' руб.</p><!--Цена перехода-->
                <p></p><!--Количество подписавшихся-->
            </div>
        </button>
    </div>');
    $itr = $itr + 3;
    }
    while($itr <= $last_key);
    ?>
</form>