<!DOCTYPE html>
<html>
<head>
    <title>Статус машины на парковке</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
if ($_GET['parking_status'] == 1) {
    $parking_status = 1;
} else {
    $parking_status = 0;
}
$car_id = $_GET['car_id'];
$result = mysqli_query($link, "UPDATE `cars` SET `parking` = $parking_status WHERE `car_id` = $car_id");
if ($result) {
    echo 'Статус машины на парковке изменен!<br/><button><a href="client_info.php?client_id='.$_GET['client_id'].'">На старницу информации о клиенте</a></button>';
} else {
    echo 'Статус машины на парковке не изменен!<br/><button><a href="client_info.php?client_id='.$_GET['client_id'].'">На старницу информации о клиенте</a></button>';
}
?>
</body>
</html>