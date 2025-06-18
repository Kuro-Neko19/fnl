<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: https://final.local/404");
    }

    require_once realpath('Application/Core/request_protection.php');
	$request = new RequestProtection;

    require realpath('vendor/autoload.php');

spl_autoload_extensions(".php");
spl_autoload_register();

    $connect = new Processing\Profile;
    $connect->Profile();

    global $mysql;


    $a = 0;

    if(isset($_GET['id']) && isset($_GET['type'])){
        $usr_id = htmlspecialchars($_GET['id']);
        $t_type = htmlspecialchars($_GET['type']);
        
        //
        if($t_type == 'master'){

        //    $sql = "SELECT * FROM master_db";
        //    $result = mysqli_query($mysql, $sql);
        //    while($mstr = mysqli_fetch_assoc($result)){
        //        $users_m_id[$tbl_master] = trim($mstr['id']);
        //        $users_m_name[$tbl_master] = trim($mstr['name']);
        //        $users_m_login[$tbl_master] = trim($mstr['login']);
        //        $users_m_password[$tbl_master] = trim($mstr['password']);
        //        if($mstr['offers'] !== null){
        //            $users_m_offers[$tbl_master] = trim($mstr['offers']);
        //        }
        //        else $users_m_offers[$tbl_master] = $mstr['offers'];
        //
        //        $tbl_master = $tbl_master + 1;
        //    }

            $sql = "SELECT * FROM master_db";
            $result = mysqli_query($mysql, $sql);
            while($usrs = mysqli_fetch_assoc($result)){
                $usersid[$a] = trim($usrs['id']);
                $usersname[$a] = trim($usrs['name']);
                $userslog[$a] = trim($usrs['login']);
                if($usrs['offers'] !== null){
                    $usersoffers[$a] = trim($usrs['offers']);
                }
                else $usersoffers[$a] = $usrs['offers'];

                $a = $a + 1;
            }
        }
        
        if($t_type == 'advertiser'){

        //    $sql = "SELECT * FROM advertiser_db";
        //    $result = mysqli_query($mysql, $sql);
        //    while($adv = mysqli_fetch_assoc($result)){
        //        $users_a_id[$tbl_adv] = trim($adv['id']);
        //        $users_a_name[$tbl_adv] = trim($adv['name']);
        //        $users_a_log[$tbl_adv] = trim($adv['login']);
        //        $users_a_pass[$tbl_adv] = trim($adv['password']);
        //
        //        $tbl_adv = $tbl_adv + 1;
        //    }

            $sql = "SELECT * FROM advertiser_db";
            $result = mysqli_query($mysql, $sql);
            while($usrs = mysqli_fetch_assoc($result)){
                $usersid[$a] = trim($usrs['id']);
                $usersname[$a] = trim($usrs['name']);
                $userslog[$a] = trim($usrs['login']);

                $a = $a + 1;
            }
        }

        if($t_type == 'admin'){

        //    $sql = "SELECT * FROM admin_db";
        //   $result = mysqli_query($mysql, $sql);
        //    while($adm = mysqli_fetch_assoc($result)){
        //        $users_adm_id[$tbl_admin] = trim($adm['id']);
        //        $users_adm_name[$tbl_admin] = trim($adm['name']);
        //        $users_adm_log[$tbl_admin] = trim($adm['login']);
        //        $users_adm_pass[$tbl_admin] = trim($adm['password']);
        //
        //        $tbl_admin = $tbl_admin + 1;
        //    }

            $sql = "SELECT * FROM admin_db";
            $result = mysqli_query($mysql, $sql);
            while($usrs = mysqli_fetch_assoc($result)){
                $usersid[$a] = trim($usrs['id']);
                $usersname[$a] = trim($usrs['name']);
                $userslog[$a] = trim($usrs['login']);

                $a = $a + 1;
            }
        }
        $arr_key = array_search($usr_id, $usersid);

        if($_GET['type'] == 'advertiser'){
            $usr_type = "Рекламодатель";
        }
        if($_GET['type'] == 'master'){
            $usr_type = "Веб-мастер";
        }
        if($_GET['type'] == 'admin'){
            $usr_type = "Админ";
        }

        $usr_login = $userslog[$arr_key];
        $usr_name = $usersname[$arr_key];

        //если мастер
        if($_GET['type'] == 'master'){
            if(!empty($usersoffers[$arr_key])){
                $ofr = explode(' ', $usersoffers[$arr_key]);
                $itr = 0;
                $l_k = array_key_last($ofr);

                do{
                    $off[$itr] = array_search($ofr[$itr], $offerid);

                    $itr = $itr + 1;
                }
                while($itr <= $l_k);

                $mm = 1;
            }

        }

        //если рекламодатель
        if($_GET['type'] == 'advertiser'){
            $l_k_ofr = array_key_last($offerown);

            $c = 0;
            $d = 0;

            do{
                if($usr_login == $offerown[$c]){
                    $ofr_adv[$d] = $c;

                    $d = $d + 1;
                }

                $c = $c + 1;
            }
            while($c <= $l_k_ofr);
            
            if(isset($ofr_adv)){
                $l_k_adv = array_key_last($ofr_adv);
            }
        }
    }
    
    if(isset($_POST['logout']) && $request->is_valid()){
        unset($_SESSION['id']);
        unset($_SESSION['usr_type']);
        unset($_SESSION['usr_login']);
        unset($_SESSION['usr_name']);
        unset($_SESSION['request_token']);
    }
    

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