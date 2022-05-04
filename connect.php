<?php

//الاتصال بقواعد البيانات
$dsn = "mysql:host=localhost;dbname=id18868974_noteapp";
$user = "id18868974_root";
$password = "xtD15+wlnMD1D0NX";
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"  //لدعم اللغة العربية
);

try {
    $con = new PDO($dsn, $user, $password, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    include('functions.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>