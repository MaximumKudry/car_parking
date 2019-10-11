<!DOCTYPE html>
<html>
<head>
    <title>Редактирование информации машины</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
$car_id = $_POST['car_id'];
$govnumber = 0;
$query = mysqli_query($link, "SELECT `govnumber` FROM `cars` WHERE `car_id` != $car_id");
while($row = mysqli_fetch_array($query)) {
    if($row['govnumber'] == $_POST['govnumber']) {
        $govnumber = 1;
    }
}
if (strlen(trim($_POST['mark'])) < 1) {
    unset($_POST['mark']);
    echo 'Не введена марка автомобиля<br/><a href="edit_car.php?car_id='.$_GET['car_id'].'&client_id='.$_GET['client_id'].'">Назад</a>';
} elseif (strlen(trim($_POST['model'])) < 1){
    unset($_POST['model']);
    echo 'Не введена модель автомобиля<br/><a href="edit_car.php?car_id='.$_GET['car_id'].'&client_id='.$_GET['client_id'].'">Назад</a>';
} elseif (strlen(trim($_POST['color'])) < 1) {
    unset($_POST['color']);
    echo 'Не введен цвет автомобиля<br/><a href="edit_car.php?car_id='.$_GET['car_id'].'&client_id='.$_GET['client_id'].'">Назад</a>';
} elseif (strlen(trim($_POST['govnumber'])) < 1) {
    unset($_POST['govnumber']);
    echo 'Не введен гос. номер автомобиля<br/><a href="edit_car.php?car_id='.$_GET['car_id'].'&client_id='.$_GET['client_id'].'">Назад</a>';
} elseif ($govnumber == 1) {
    unset($_POST['govnumber']);
    echo 'Гос. номер автомобиля уже существует!<br/><a href="edit_car.php?car_id='.$_GET['car_id'].'&client_id='.$_GET['client_id'].'">Назад</a>';
} else {
    $client_id = $_GET['client_id'];
    $car_id = $_POST['car_id'];
    $mark = htmlspecialchars($_POST['mark']);
    $model = htmlspecialchars($_POST['model']);
    $color = htmlspecialchars($_POST['color']);
    $govnumber = htmlspecialchars($_POST['govnumber']);
    $query = "UPDATE `cars` SET `mark` = ?, `model` = ?, `color` = ?, `govnumber` = ? WHERE `car_id` = $car_id";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $mark, $model, $color, $govnumber);
    if (mysqli_stmt_execute($stmt) == 'true') {
        echo 'Данные о машине изменены!<br/><button><a href="client_info.php?client_id='.$_GET['client_id'].'">На страницу информации о клиенте</a></button>';
    } else {
        echo 'Данные о машине не изменены!<br/><button><a href="client_info.php?client_id='.$_GET['client_id'].'">На страницу информации о клиенте</a></button>';
    }
    mysqli_stmt_close($stmt);
}
?>
</body>
</html>