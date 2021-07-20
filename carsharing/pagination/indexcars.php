<?php
include'connect.php';
if (isset($_GET['page'])){
	$page = $_GET['page'];
}else $page = 1;

$kol = 4; //количество записей для вывода
$art = ($page * $kol) - $kol;

//Определяем все количество записей в таблице
$res = mysqli_query($link, "SELECT COUNT(*) FROM cars ");
$row = mysqli_fetch_row($res);
$total = $row[0];

//количесвто страниц для пагинации
$str_pag = ceil($total / $kol);

//формируем пагинацию
for ($i = 1; $i <= $str_pag; $i++){
	echo "<a href=indexcars.php?page=".$i."> Страница ".$i."</a>";
}
echo "<br>";
//запрос и вывод записей
$result = mysqli_query($link, "SELECT * FROM cars LIMIT $art,$kol");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Грузы</title>
</head>
<body>
	<br>
	<table border=1>
		<tr>
			<td> ID машины</td>
			<td> ID бренда</td>
			<td> Модель</td>
			<td> Номер</td>
		</tr>
<?php
	while ($row = mysqli_fetch_array($result)){
		echo "<tr>".
		"<td>{$row['id_car']}</td>".
		"<td>{$row['id_brand']}</td>".
		"<td>{$row['name']}</td>".
		"<td>{$row['plate']}</td>".
		'</tr>';
	}
?>
	</table>
	<form action="index.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>