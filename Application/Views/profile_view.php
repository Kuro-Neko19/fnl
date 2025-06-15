<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: https://final.local/404");
    }

    require_once realpath('Functions/processing/profile.php');
    require_once realpath('Functions/processing/offers.php');
    require_once realpath('Functions/processing/date.php');
    require_once realpath('Application/Core/request_protection.php');
    require_once realpath('Functions/processing/admin.php');

	$request = new RequestProtection;

    $b = 0;
?>
<!-- -->
<div class=""> <!--Элемент профиля-->
    <p id=""><?echo $usr_name;?></p>
    <p id=""><?echo $usr_type;?></p>
    <form method="post">
        <input type="hidden" name="csrf_token" value="<?echo $request->previous_hash?>"/>
        <button type="submit" name="logout">Выйти</button>
    </form>
</div>

<div><!--Статистика-->
    <?

        //Статистика мастера
        if($_SESSION['id'] == $_GET['id'] && $_SESSION['usr_type'] == 'master'){
            print('<div>
                <div>
                    <p>Всего переходов по ссылкам: ' . $all_tr . '</p>
                    <p>Заработок за всё время (с учётом 20%-ой комиссии): ' . $all_ern . '</p>
                </div>

                <div>
                    <p>Переходов по ссылкам за текущий день: ' . $day_tr . '</p>
                    <p>Заработок за текущий день (с учётом 20%-ой комиссии): ' . $day_ern . '</p>
                </div>

                <div>
                    <p>Переходов по ссылкам за текущий месяц: ' . $month_tr . '</p>
                    <p>Заработок за текущий месяц (с учётом 20%-ой комиссии): ' . $month_ern . '</p>
                </div>

                <div>
                    <p>Переходов по ссылкам за текущий год: ' . $year_tr . '</p>
                    <p>Заработок за текущий год (с учётом 20%-ой комиссии): ' . $year_ern . '</p>
                </div>
            ');
        }

        //Статистика рекламодателя
        if($_SESSION['id'] == $_GET['id'] && $_SESSION['usr_type'] == 'advertiser'){
            print('<div>
                <div>
                    <p>Всего переходов по ссылкам: ' . $all_tr . '</p>
                    <p>Расход за всё время: ' . $all_exp . '</p>
                </div>

                <div>
                    <p>Переходов по ссылкам за текущий день: ' . $day_tr . '</p>
                    <p>Расход за текущий день: ' . $day_exp . '</p>
                </div>

                <div>
                    <p>Переходов по ссылкам за текущий месяц: ' . $month_tr . '</p>
                    <p>Расход за текущий месяц: ' . $month_exp . '</p>
                </div>

                <div>
                    <p>Переходов по ссылкам за текущий год: ' . $year_tr . '</p>
                    <p>Расход за текущий год: ' . $year_exp . '</p>
                </div>
            ');
        }

        //Статистика заработка системы
        if($_SESSION['usr_type'] == 'admin'){
            print('<div>
                <div>
                    <p>Доход за всё время: ' . $earn_sistem_all . '</p>
                </div>

                <div>
                    <p>Доход за текущий день: ' . $earn_sistem_day . '</p>
                </div>

                <div>
                    <p>Доход за текущий месяц: ' . $earn_sistem_month . '</p>
                </div>

                <div>
                    <p>Доход за текущий год: ' . $earn_sistem_year . '</p>
                </div>
            ');
        }
    ?>
</div>

<div><!--Список-->
    <form method="post">
        <input type="hidden" name="csrf_token" value="<?echo $request->previous_hash?>"/>
    <?
    //если мастер
    if($_GET['type'] == 'master' && isset($mm)){
        do{
            if(isset($off[$b])){
        print('<div>
            <button type="submit" value="' . $off[$b] . '" name="offer_butt"><!--Кнопка с оффером-->
                <p>' . $offername[$off[$b]] .'</p><!--Название оффера-->
                <div>
                    <p>' . $offerprice[$off[$b]] .' руб.</p><!--Цена перехода-->
                    <p></p><!--Количество подписавшихся-->
                </div>
            </button>
        </div>');
            }
    
            if(isset($off[$b + 1])){
        print('<div>
            <button type="submit" value="' . $off[$b + 1] . '" name="offer_butt"><!--Кнопка с оффером-->
                <p>' . $offername[$off[$b + 1]] .'</p><!--Название оффера-->
                <div>
                    <p>' . $offerprice[$off[$b + 1]] .' руб.</p><!--Цена перехода-->
                    <p></p><!--Количество подписавшихся-->
                </div>
            </button>
        </div>');
            }

            if(isset($off[$b + 2])){
        print('<div>
            <button type="submit" value="' . $off[$b + 2] . '" name="offer_butt"><!--Кнопка с оффером-->
                <p>' . $offername[$off[$b + 2]] .'</p><!--Название оффера-->
                <div>
                    <p>' . $offerprice[$off[$b + 2]] .' руб.</p><!--Цена перехода-->
                    <p></p><!--Количество подписавшихся-->
                </div>
            </button>
        </div>');
            }
        $b = $b + 3;
        }
        while($b <= $l_k);
    }

    //если рекламодатель
    if($_GET['type'] == 'advertiser' && isset($ofr_adv)){
        do{
            if(isset($ofr_adv[$b])){
        print('<div>
            <button type="submit" value="' . $ofr_adv[$b] . '" name="offer_butt"><!--Кнопка с оффером-->
                <p>' . $offername[$ofr_adv[$b]] .'</p><!--Название оффера-->
                <div>
                    <p>' . $offerprice[$ofr_adv[$b]] .' руб.</p><!--Цена перехода-->
                    <p></p><!--Количество подписавшихся-->
                </div>
            </button>
        </div>');
            }
    
            if(isset($ofr_adv[$b + 1])){
        print('<div>
            <button type="submit" value="' . $ofr_adv[$b + 1] . '" name="offer_butt"><!--Кнопка с оффером-->
                <p>' . $offername[$ofr_adv[$b + 1]] .'</p><!--Название оффера-->
                <div>
                    <p>' . $offerprice[$ofr_adv[$b + 1]] .' руб.</p><!--Цена перехода-->
                    <p></p><!--Количество подписавшихся-->
                </div>
            </button>
        </div>');
            }

            if(isset($ofr_adv[$b + 2])){
        print('<div>
            <button type="submit" value="' . $ofr_adv[$b + 2] . '" name="offer_butt"><!--Кнопка с оффером-->
                <p>' . $offername[$ofr_adv[$b + 2]] .'</p><!--Название оффера-->
                <div>
                    <p>' . $offerprice[$ofr_adv[$b + 2]] .' руб.</p><!--Цена перехода-->
                    <p></p><!--Количество подписавшихся-->
                </div>
            </button>
        </div>');
            }
        $b = $b + 3;
        }
        while($b <= $l_k_adv);
    }
    ?>
    </form>
</div>