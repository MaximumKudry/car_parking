<!DOCTYPE html>
<html>
<head>
    <title>Редактирование информации о клиенте</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="POST" action="edit_client_info.php?client_id=<?= $_GET['client_id']?>">
    <input type="hidden" name="client_id" value="<?= $_GET['client_id']?>">
    <input type="text" name="client" placeholder="ФИО клиента">
    <select name="gender">
        <option value="Мужской">Мужской</option>
        <option value="Женский">Женский</option>
    </select>
    <input type="text" name="phonenumber" placeholder="Номер телефона">
    <input type="text" name="adress" placeholder="Адрес">
    <input class="submit" type="submit" name="submit" value="Изменить данные">
</form>
</body>
</html>