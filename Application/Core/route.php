<?php namespace Core;

    use Core\Controller;
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

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if(strpos($routes[1], '?') !== false){
			$rout = explode('?', $routes[1]);
			$routes[1] = $rout[0];


			$part = explode('&', $rout[1]);

			$frgmt0 =  explode('=', $part[0]);
			$_GET[$frgmt0[0]] = htmlspecialchars($frgmt0[1]);

			if(!empty($part[1])){
			    $frgmt1 =  explode('=', $part[1]);
			    $_GET[$frgmt1[0]] = htmlspecialchars($frgmt1[1]);
			}
		}

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller'.$controller_name;
		$action_name = 'action_'.$action_name;

		/*
		echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";
		*/

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "Application/Controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "Application/Controllers/".$controller_file;
		}
		else
		{
			header("Location: https://final.local/404");
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			header("Location: https://final.local/404");
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
