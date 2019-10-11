<!DOCTYPE html>
<html>
<head>
    <title>Редактирование информации о клиенте</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';
$client_id = $_POST['client_id'];
$phonenumber = 0;
$query = mysqli_query($link, "SELECT `phonenumber` FROM `clients` WHERE `client_id` != $client_id");
while($row = mysqli_fetch_array($query)) {
    if($row['phonenumber'] == $_POST['phonenumber']) {
        $phonenumber = 1;
    }
}
if (strlen(trim($_POST['client'])) < 3) {
    unset($_POST['client']);
    echo 'Некорректно ввели ФИО<br/><a href="edit_client.php?client_id='.$_GET['client_id'].'">Назад </a>';
} elseif (strlen(trim($_POST['phonenumber'])) < 1) {
    unset($_POST['phonenumber']);
    echo 'Не введен номер телефона<br/><a href="edit_client.php?client_id='.$_GET['client_id'].'">Назад </a>';
} elseif ($phonenumber == 1) {
    unset($_POST['phonenumber']);
    echo 'Номер телефона уже существует!<br/><a href="edit_client.php?client_id='.$_GET['client_id'].'">Назад </a>';
} elseif (strlen(trim($_POST['adress'])) < 1) {
    unset($_POST['adress']);
    echo 'Не введен адрес клиента<br/><a href="edit_client.php?client_id='.$_GET['client_id'].'">Назад </a>';
} else {
    $client = htmlspecialchars($_POST['client']);
    $gender = htmlspecialchars($_POST['gender']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $adress = htmlspecialchars($_POST['adress']);
    $query = "UPDATE `clients` SET `client` = ?, `gender` = ?, `phonenumber` = ?, `adress` = ? WHERE `client_id` = $client_id";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $client, $gender, $phonenumber, $adress);
    if (mysqli_execute($stmt) == 'true') {
        echo 'Данные о клиенте изменены!<br/><button><a href="client_info.php?client_id='.$_GET['client_id'].'">На страницу информации о клиенте</a></button>';
    } else {
        echo 'Данные о клиенте не изменены<br/><button><a href="client_info.php?client_id='.$_GET['client_id'].'">На страницу информации о клиенте</a></button>';
    }
    mysqli_stmt_close($stmt);
    
}
?>
</body>
</html>