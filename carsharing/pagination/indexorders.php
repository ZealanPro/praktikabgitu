<?php
include'connect.php';
// определение текущей страницы
if (isset($_GET['page'])){
	$page = $_GET['page'];
}else $page = 1;

$kol = 3; //количество записей для вывода
$art = ($page * $kol) - $kol;

//Определяем все количество записей в таблице
$res = mysqli_query($link, "SELECT COUNT(*) FROM orders ");
$row = mysqli_fetch_row($res);
$total = $row[0];

//количесвто страниц для пагинации
$str_pag = ceil($total / $kol);

//формируем пагинацию
for ($i = 1; $i <= $str_pag; $i++){
	echo "<a href=indexorders.php?page=".$i."> Страница ".$i."</a>";
}
echo "<br>";
//запрос и вывод записей
$result = mysqli_query($link, "SELECT * FROM orders LIMIT $art,$kol");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Заказы</title>
</head>
<body>
	<br>
	<table border=1>
		<tr>
			<td> ID заказа</td>
			<td> ID клиента</td>
			<td> ID машины</td>
			<td> ID тарифа</td>
			<td> Время начала</td>
			<td> Время конца</td>
			<td> Пробег</td>
			<td> Остаток топлива</td>
		</tr>
<?php
	while ($row = mysqli_fetch_array($result)){
		echo "<tr>".
		"<td>{$row['id_order']}</td>".
		 "<td>{$row['id_client']}</td>".
		 "<td>{$row['id_car']}</td>".
		 "<td>{$row['id_tariff']}</td>".
		 "<td>{$row['begintime']}</td>".
		 "<td>{$row['endtime']}</td>".
		 "<td>{$row['mileage']}</td>".
		 "<td>{$row['fuelleft']}</td>".
		'</tr>';
	}
?>
	</table>
	<form action="index.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>