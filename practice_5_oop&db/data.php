<?php

require_once 'classes.php';

$publications = [];

$connection = mysqli_connect("localhost", "root", "", "publications");
if (mysqli_connect_errno()) {
    echo "Подключение отсутствует: ". mysqli_connect_error();
}

$result = mysqli_query($connection, "SELECT * FROM publication");


while ($row = mysqli_fetch_array($result)) {
    $publications[] = new $row['type']($row);
}



?>