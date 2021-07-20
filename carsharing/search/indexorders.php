<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Заказы</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>Поле для поиска </td>
				<td><input type="text" name="poisk" value="<?=$_POST['poisk']; ?>"></td>
				<td><input type="submit" name="submit" value="OK"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
include('connect.php');
$poisk = $_POST['poisk'];
$reset = $_POST['reset'];
if (empty($poisk))
{
	$sql = "SELECT * FROM orders";
	$result = mysqli_query($link, $sql);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID заказа</td>'.
		 '<td>ID клиента</td>'.
		 '<td>ID машины</td>'.
		 '<td>ID тарифа</td>'.
		 '<td>Начало аренды</td>'.
		 '<td>Конец аренды</td>'.
		 '<td>Пробег</td>'.
		 '<td>Остаток топлива</td>'.
		 '</tr>';
		 while ($row = mysqli_fetch_array($result)) {
		 	echo
		 	'<tr>'.
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
		 echo '</table>';
} else {
	$sqllike = "SELECT * FROM orders WHERE id_order LIKE '%$poisk%' OR id_client LIKE '%$poisk%' OR id_car LIKE '%$poisk%' OR id_tariff LIKE '%$poisk%' OR begintime LIKE '%$poisk%' OR endtime LIKE '%$poisk%' OR mileage LIKE '%$poisk%' OR fuelleft LIKE '%$poisk%'";
	$res = mysqli_query($link, $sqllike);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID заказа</td>'.
		 '<td>ID клиента</td>'.
		 '<td>ID машины</td>'.
		 '<td>ID тарифа</td>'.
		 '<td>Начало аренды</td>'.
		 '<td>Конец аренды</td>'.
		 '<td>Пробег</td>'.
		 '<td>Остаток топлива</td>'.
		 '</tr>';
		while ($row1 = mysqli_fetch_array($res)) {
		 	echo
		 	'<tr>'.
		 	"<td>{$row1['id_order']}</td>".
		 	"<td>{$row1['id_client']}</td>".
		 	"<td>{$row1['id_car']}</td>".
		 	"<td>{$row1['id_tariff']}</td>".
		 	"<td>{$row1['begintime']}</td>".
		 	"<td>{$row1['endtime']}</td>".
		 	"<td>{$row1['mileage']}</td>".
		 	"<td>{$row1['fuelleft']}</td>".
		 	'</tr>';
		 }
		 echo '</table>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Марки</title>
</head>
<body>
	<form action="index.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>