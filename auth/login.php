<?php
include('../connect.php');


$email = filterrequest('email');
$password = filterrequest('password');

$stmt = $con->prepare("SELECT * FROM users WHERE `password` = ? AND email = ?");
$stmt->execute(array($password, $email));
$userdata = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "userdata" => $userdata));
} else {
    echo json_encode(array("status" => "fails"));
}
