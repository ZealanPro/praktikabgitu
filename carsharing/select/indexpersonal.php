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
    //запрос на вывод таблицы personal
    $sql_personal = "SELECT id_personal, name, id_job FROM personal";
    $result_personal = mysqli_query($link, $sql_personal);
?>
    <h2> Таблица "Персонал"</h2>
    <table border=1>
          <tr>
          '<td>ID персонала</td>'.
	  '<td>ФИО</td>'.
          '<td>ID работы</td>'.
          </tr>
<?php
        while ($row = mysqli_fetch_array($result_personal)) {
            echo '<tr>'.
            "<td>{$row['id_personal']}</td>".
	    "<td>{$row['name']}</td>".
	    "<td>{$row['id_job']}</td>".
            '</tr>';
        }
?>
</table>
        <form action="index.php" method="post">
        <input type="submit" value="Вернуться назад">
        </form>
</body>
</html>