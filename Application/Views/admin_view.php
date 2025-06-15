<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: https://final.local/404");
    }

    require_once realpath('Functions/processing/offers.php');
    require_once realpath('Functions/processing/admin.php');
    require_once realpath('Application/Core/request_protection.php');

	$request = new RequestProtection;

    $itr = 0;
?>
<!-- -->
<div>
    <form method="post">
        <input type="hidden" name="csrf_token" value="<?echo $request->previous_hash?>"/>
        <div>
            <button type="submit" name="adm_offr">Offer`ы</button>
            <button type="submit" name="adm_adv">Рекламодатели</button>
            <button type="submit" name="adm_mster">Веб-мастера</button>
        </div>

        <div>
            <button type="submit" name="adm_reg_adv">Зарегистрировать рекламодателя</button>
            <button type="submit" name="adm_reg_mstr">Зарегистрировать веб-мастера</button>
            <button type="submit" name="adm_reg_adm">Зарегистрировать администратора</button>
        </div>
    </form>
</div>


<form method="post">
<div><!--Список офферов-->

    <?
    if(isset($offrs_list) && $offrs_list == 1){
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
        }
    ?>

</div>

<div><!--Список рекламодателей-->

<?
    if(isset($adv_list) && $adv_list == 1){
    do{
        if(isset($users_a_name[$itr])){
        print('<div>
            <button type="submit" value="' . $itr . '" name="adv_butt"><!--Кнопка с рекламодателем-->
                <p>' . $users_a_name[$itr] .'</p><!--Имя-->
            </button>
        </div>');
        }
    
        if(isset($users_a_name[$itr + 1])){
        print('<div>
            <button type="submit" value="' . $itr + 1 . '" name="adv_butt"><!--Кнопка с рекламодателем-->
                <p>' . $users_a_name[$itr + 1] .'</p><!--Имя-->
            </button>
        </div>');
        }

        if(isset($users_a_name[$itr + 2])){
        print('<div>
            <button type="submit" value="' . $itr + 2 . '" name="adv_butt"><!--Кнопка с рекламодателем-->
                <p>' . $users_a_name[$itr + 2] .'</p><!--Имя-->
            </button>
        </div>');
        }
        $itr = $itr + 3;
        }
        while($itr <= $last_adv_key);
        }
    ?>

</div>

<div><!--Список веб-мастеров-->

    <?
    if(isset($mstr_list) && $mstr_list == 1){
    do{
        if(isset($users_m_name[$itr])){
        print('<div>
            <button type="submit" value="' . $itr . '" name="mst_butt"><!--Кнопка с мастером-->
                <p>' . $users_m_name[$itr] .'</p><!--Имя-->
            </button>
        </div>');
        }
    
        if(isset($users_m_name[$itr +1])){
        print('<div>
            <button type="submit" value="' . $itr + 1 . '" name="mst_butt"><!--Кнопка с мастером-->
                <p>' . $users_m_name[$itr + 1] .'</p><!--Имя-->
            </button>
        </div>');
        }

        if(isset($users_m_name[$itr + 2])){
        print('<div>
            <button type="submit" value="' . $itr + 2 . '" name="mst_butt"><!--Кнопка с мастером-->
                <p>' . $users_m_name[$itr + 2] .'</p><!--Имя-->
            </button>
        </div>');
        }
        $itr = $itr + 3;
        }
        while($itr <= $last_mst_key);
        }
    ?>
    
</div>