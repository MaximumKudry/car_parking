<!DOCTYPE html>
<html>
<head>
    <title>Дополнительная машина</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="POST" action="add_extra_car_info.php?client_id=<?= $_GET['client_id']?>">   
    <input type="hidden" name="id" value="<?= $_GET['client_id']?>">
    <input type="text" name="mark" placeholder="Введите марку автомобиля">
    <input type="text" name="model" placeholder="Введите модель автомобиля">
    <input type="text" name="color" placeholder="Введите цвет автомобиля">
    <input type="text" name="govnumber" placeholder="Введите гос. номер автомобиля">  
    <input type="submit" name="submit" value="Добавить автомобиль">
</form>
</body>
</html>