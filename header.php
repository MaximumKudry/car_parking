<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/car_parking/database.php';

function main($link) {
    echo '<table><tr><td>ФИО</td><td>Марка</td><td>Модель</td></tr>';
        $query = mysqli_query($link, "SELECT `client_id`, `client`, `mark`, `model`, `parking` FROM `clients`, `cars` WHERE parking = 1 AND client_id = id ORDER BY client_id");
        while($row = mysqli_fetch_array ($query))
            {
                echo '<tr><td><a href="client_info.php?client_id='.$row['client_id'].'">'.$row['client'].'</a></td><td>'.$row['mark'].'</td><td>'.$row['model'].'</td>';
            }
echo '</table>';}

?>