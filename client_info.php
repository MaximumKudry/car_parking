<!DOCTYPE html>
<html>
<head>
    <title>Информация о клиенте</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
$client_id = $_GET['client_id'];
echo '<table><tr>
                <td>ФИО</td>
                <td>Пол</td>
                <td>Номер телефона</td>
                <td>Адрес</td></tr>';
$query = mysqli_query($link, "SELECT * FROM `clients` WHERE client_id = $client_id");
while($row = mysqli_fetch_array($query)) {
    echo '<tr><td>'
    .$row['client'].'</td><td>'
    .$row['gender'].'</td><td>'
    .$row['phonenumber'].'</td><td>'
    .$row['adress'].'</td></tr></table>';
}
echo '<button><a href="edit_client.php?client_id='.$client_id.'">Редактирование информации о клиенте</a></button><br/>';
echo 'Информация о машин(е/ах)';
echo '<table><tr>
                <td>№</td>
                <td>Марка</td>
                <td>Модель</td>
                <td>Цвет</td>
                <td>Гос. номер</td>
                <td>Статус машины</td>
                <td>Действие</td>
                <td>Редактирование</td>
                <td>Удаление</td></tr>';
$query = mysqli_query($link, "SELECT * FROM `cars` WHERE id = $client_id ORDER BY car_id");
$i= 1;
while($row = mysqli_fetch_array($query)) {
    echo '<tr>
    <td>'.$i.'</td>
    <td>'.$row['mark'].'</td>
    <td>'.$row['model'].'</td>
    <td>'.$row['color'].'</td>
    <td>'.$row['govnumber'].'</td>';
    if ($row['parking'] == 1) {
        echo '<td>На парковке</td>
              <td><button><a href="parking_status.php?car_id='.$row['car_id'].'&client_id='.$client_id.'&parking_status=0">Выехала с парковки</a></button></td>';
    } else {
        echo '<td>Вне парковки</td>
              <td><button><a href="parking_status.php?car_id='.$row['car_id'].'&client_id='.$client_id.'&parking_status=1">Въехала на парковку</a></button></td>';
    }
    echo '<td><button><a href="edit_car.php?car_id='.$row['car_id'].'&client_id='.$client_id.'">Редактировать</a></button>
    <td><button><a href="del_car.php?car_id='.$row['car_id'].'&client_id='.$client_id.'">Удалить</a></button></td></tr>';
    $i++;
}
echo '</table>';
?>
<form method="POST" action="add_extra_car_info.php?client_id=<?= $_GET['client_id']?>">   
    <input type="hidden" name="id" value="<?= $_GET['client_id']?>">
    <input type="text" name="mark" placeholder="Введите марку автомобиля">
    <input type="text" name="model" placeholder="Введите модель автомобиля">
    <input type="text" name="color" placeholder="Введите цвет автомобиля">
    <input type="text" name="govnumber" placeholder="Введите гос. номер автомобиля">  
    <input class="submit" type="submit" name="submit" value="Добавить автомобиль">
</form>
<div>
    <button>
        <a href="del_client.php?client_id=<?= $client_id?>" onclick='return confirm("Вы уверены, что хотите удалить клиента?")'>Удалить клиента</a>
    </button>
</div>
<div>
    <button>
        <a href="index.php">Вернуться на главную страницу</a>
    </button>
</div>
</body>
</html>