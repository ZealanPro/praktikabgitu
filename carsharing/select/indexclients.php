<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
	include('connect.php');
	//запрос на вывод таблицы clients
	$sql_clients = "SELECT client_id, name, discount FROM clients";
	$result_clients = mysqli_query($link, $sql_clients);
?>
	<h2> Таблица "Клиенты"</h2>
	<table border=1>
		  <tr>
		 '<td>ID клиента</td>'.
		 '<td>ФИО</td>'.
		 '<td>Скидка</td>'.
		  </tr>
<?php
		while ($row = mysqli_fetch_array($result_clients)) {
			echo '<tr>'.
		 	"<td>{$row['client_id']}</td>".
		 	"<td>{$row['name']}</td>".
			"<td>{$row['discount']}</td>".
			'</tr>';
		}
?>
</table>
		<form action="index.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>