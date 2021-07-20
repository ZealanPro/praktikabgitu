<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Персонал</title>
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
	$sql = "SELECT * FROM tariff";
	$result = mysqli_query($link, $sql);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID тарифа</td>'.
		 '<td>Название</td>'.
		 '<td>Цена</td>'.
		 '</tr>';
		 while ($row = mysqli_fetch_array($result)) {
		 	echo
		 	'<tr>'.
		 	"<td>{$row['id_tariff']}</td>".
		 	"<td>{$row['name']}</td>".
		 	"<td>{$row['price']}</td>".
		 	'</tr>';
		 }
		 echo '</table>';
} else {
	$sqllike = "SELECT * FROM orders WHERE id_tariff LIKE '%$poisk%' OR name LIKE '%$poisk%' OR price LIKE '%$poisk%'";
	$res = mysqli_query($link, $sqllike);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID тарифа</td>'.
		 '<td>Название</td>'.
		 '<td>Цена</td>'.
		 '</tr>';
		while ($row1 = mysqli_fetch_array($res)) {
		 	echo
		 	'<tr>'.
		 	"<td>{$row1['id_tariff']}</td>".
		 	"<td>{$row1['name']}</td>".
		 	"<td>{$row1['price']}</td>".
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
	<title>Персонал</title>
</head>
<body>
	<form action="index.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>