<!DOCTYPE html>
<html>
<head>
    <title>Информация о клиентах</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
echo '<table><tr><td>№</td><td>ФИО</td><td>Пол</td><td>Номер телефона</td><td>Адрес</td><td>Редактирование</td><td>Удаление</td></tr>';
$query = mysqli_query($link, "SELECT * FROM `clients`");
$i = 1;
while($row = mysqli_fetch_array ($query))
    {
        echo '<tr>
        <td>'.$i.'</td>
        <td><a href="client_info.php?client_id='.$row['client_id'].'">'.$row['client'].'</a></td>
        <td>'.$row['gender'].'</td>
        <td>'.$row['phonenumber'].'</td>
        <td>'.$row['adress'].'</td>
        <td><button><a href="edit_client.php?client_id='.$row['client_id'].'">Редактировать</a></button></td>
        <td><button><a href="del_client.php?client_id='.$row['client_id'].'">Удалить</a></button></td>
        </tr>';
        $i++;
    }
echo '</table>';
?>
<button>
    <a href="index.php">Вернуться на главную страницу</a>
</button>
</body>
</html>