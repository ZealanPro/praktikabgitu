<?php
$link = mysqli_connect('localhost', 'root', 'root', 'carsharing');
$query = "SELECT bin_data,filetype, filename from image WHERE id_im={$_GET['id_im']}";
$result = mysqli_query($link, $query);
if(!$result) exit("Ошибка выполнения SQL запроса!");
$row = mysqli_fetch_array($result)
//передаем тип файла
header( "Content-type: ".$row['filetype']."");
//передаем имя файла 
header("Content-Disposition: attachment; filename={$row['filename']}");
//выводим файл
echo $row['bin_data']; mysqli_close($link);
?>
