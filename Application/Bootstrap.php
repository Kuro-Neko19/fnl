<?php

    use Core\Controller;
    use Core\Route;
	use Core\View;
	use Controllers\ControllerAdmAdminReg;
	use Controllers\ControllerAdmAdvertiserReg;
	use Controllers\ControllerAdmMasterReg;
	use Controllers\ControllerAdminLogin;
	use Controllers\ControllerAdmin;
	use Controllers\ControllerAdvertiserAuth;
	use Controllers\ControllerCreateOffer;
	use Controllers\ControllerEditing;
	use Controllers\ControllerError404;
	use Controllers\ControllerMain;
	use Controllers\ControllerMasterAuth;
	use Controllers\ControllerOffer;
	use Controllers\ControllerOffers;
	use Controllers\ControllerProfile;
	use Controllers\ControllerRedirect;

require_once 'core/view.php'; 
require_once 'core/controller.php'; 
require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор
