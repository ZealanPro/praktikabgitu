<?php
	$host = 'localhost';
	$user = 'root';
	$password = 'root';
	$db = 'carsharing';
	
	$link = mysqli_connect($host,$user,$password,$db);

	if (!$link){
	echo "Ошибка: Невозможно установить соединение с базой данных ";
	echo '<br>';
	echo "Код ошибки errno: ". mysqli_connect_errno();
	echo '<br>';
	echo "Текст ошибки error: ". mysqli_connect_error();
	exit;
	}
	
?>