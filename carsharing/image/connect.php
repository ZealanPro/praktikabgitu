<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'carsharing';
	
$link = mysqli_connect($host,$user,$password,$db);
echo "Соединение с базой данных carsharing установлено!";
?>