<?php
include('../connect.php');


$userid = filterrequest('notes_users');


$stmt = $con->prepare("SELECT * FROM notes WHERE `notes_users` = ? ");
$stmt->execute(array($userid));
$notedata = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "notedata" => $notedata));
} else {
    echo json_encode(array("status" => "fails"));
}
