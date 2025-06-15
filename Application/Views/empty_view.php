<?php
    session_start();

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
<?php include 'application/views/'.$content_view; ?>
</body>
</html>