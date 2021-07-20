<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Клиенты</title>
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
	$sql = "SELECT * FROM clients";
	$result = mysqli_query($link, $sql);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID клиента</td>'.
		 '<td>ФИО</td>'.
		 '<td>Скидка</td>'.
		 '</tr>';
		 while ($row = mysqli_fetch_array($result)) {
		 	echo 
		 	'<tr>'.
		 	"<td>{$row['client_id']}</td>".
		 	"<td>{$row['name']}</td>".
			"<td>{$row['discount']}</td>".
		 	'</tr>';
		 }
		 echo '</table>';
} else {
	$sqllike = "SELECT * FROM clients WHERE client_id LIKE '%$poisk%' OR name LIKE '%$poisk%' OR discount LIKE '%$poisk%'";
	$res = mysqli_query($link, $sqllike);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID клиента</td>'.
		 '<td>ФИО</td>'.
		 '<td>Скидка</td>'.
		 '</tr>';
		while ($row1 = mysqli_fetch_array($res)) {
		 	echo 
		 	'<tr>'.
		 	"<td>{$row1['client_id']}</td>".
		 	"<td>{$row1['name']}</td>".
			"<td>{$row1['discount']}</td>".
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