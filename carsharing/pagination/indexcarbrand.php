<?php
include 'connect.php';
// определение текущей страницы 
if (isset($_GET['page'])){
	$page = $_GET['page'];
}else $page = 1;

$kol = 5; //количество записей для вывода
$art = ($page * $kol) - $kol;

//Определяем все количество записей в таблице
$res = mysqli_query($link, "SELECT COUNT(*) FROM carbrand ");
$row = mysqli_fetch_row($res);
$total = $row[0];

//количесвто страниц для пагинации
$str_pag = ceil($total / $kol);

//формируем пагинацию
for ($i = 1; $i <= $str_pag; $i++){
	echo "<a href=indexcarbrand.php?page=".$i."> Страница ".$i."</a>";
}
echo "<br>";
//запрос и вывод записей
$result = mysqli_query($link, "SELECT * FROM carbrand LIMIT $art,$kol");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Марки</title>
</head>
<body>
	<br>
	<table border=1>
		<tr>
			<td> ID бренда</td>
			<td> Бренд</td>
		</tr>
<?php
	while ($row = mysqli_fetch_array($result)){
		echo "<tr>".
		"<td>{$row['id_brand']}</td>".
		"<td>{$row['brand']}</td>".
		'</tr>';
	}
?>
	</table>
	<form action="index.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>