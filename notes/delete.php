<?php
include('../connect.php');

$noteid = filterrequest('id');
$imageName = filterrequest('imagename');

$stmt = $con->prepare("DELETE FROM `notes` WHERE id=? ");
$stmt->execute(array($noteid));
$count = $stmt->rowCount();
if ($count > 0) {
    deleteFile("../upload", $imageName);
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'fails'));
}
