<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Сохранение бинарных данных в базе данных MySQL</title>
</head>
<body>
<form method="post" action="insert.php" enctype="multipart/form-data">
<table>
<tr>
<td>Описание файла:</td>
<td><input type="text" name="form_description" size="40"></td>
</tr>
<tr>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000000000">
<td> Файл для загрузки/хранения в базе данных:</td>
<td> <input type="file" name="file" size="40"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Отправить"></td>
</tr>
</table>
</form>
<form action="select.php" method="post">
<input type="submit" name="select" value="Просмотр">
</form>
	<h1>Выйти обратно</h1>
    <form action="../main.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Обратно"></td>
            </tr>
        </table>
    </form>
</body>
</html>
