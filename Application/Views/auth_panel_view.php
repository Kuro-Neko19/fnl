<?php
    session_start();

	require_once realpath('Functions/processing/distribution.php');
	require_once realpath('Application/Core/request_protection.php');

	$request = new RequestProtection;

?>

<!DOCTYPE html> 
<html lang="ru"> 
<head> 
	<?echo $request->meta_tag();?>
<meta charset="utf-8"> 
<title>Главная</title> 
</head> 
<body>
	<form method="post">
        <input type="hidden" name="csrf_token" value="<?echo $request->previous_hash?>"/>
        <div class="">
	        <button type="submit" name="offers_list">Список offer`ов</button>
        </div>
	
	    <div>
		    <button type="submit" name="create_offer">Создать offer</button>
	    </div>

	    <div>
		    <button type="submit" name="administration">Администрирование</button>
	    </div>

	    <div>
		    <button type="submit" name="profile">Профиль</button>
	    </div>
	</form>
<?php include 'application/views/'.$content_view; ?>
</body>
</html>