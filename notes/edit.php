<?php
include('../connect.php');

$noteid = filterrequest('id');
$title = filterrequest('title');
$content = filterrequest('content');

$stmt = $con->prepare("UPDATE `notes` SET  `title` = ?, `content` = ? 
  WHERE id = ? ");
$stmt->execute(array($title, $content, $noteid));
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'fails'));
}
