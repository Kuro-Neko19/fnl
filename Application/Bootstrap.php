<?php

    use Core\Controller;
    use Core\Route;
	use Core\View;
	use Controllers\controller_adm_admin_reg;
	use Controllers\controller_adm_advertiser_reg;
	use Controllers\controller_adm_master_reg;
	use Controllers\controller_admin_login;
	use Controllers\controller_admin;
	use Controllers\controller_advertiser_auth;
	use Controllers\controller_create_offer;
	use Controllers\controller_editing;
	use Controllers\controller_error_404;
	use Controllers\controller_main;
	use Controllers\controller_master_auth;
	use Controllers\controller_offer;
	use Controllers\controller_offers;
	use Controllers\controller_profile;
	use Controllers\controller_redirect;

require_once 'core/view.php'; 
require_once 'core/controller.php'; 
require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор
