<?php
include('../connect.php');

$title = filterrequest('title');
$content = filterrequest('content');
//$image = filterrequest('image');
$userid = filterrequest('id');
$imagename = imageUpload("file");
if ($imagename != 'fail') {
    $stmt = $con->prepare("INSERT INTO `notes`( `title`, `content`, `image`, `notes_users`) VALUES
 (?,?,?,?)");
    $stmt->execute(array($title, $content, $imagename, $userid));
    $count = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'fails'));
    }
} else {
    echo json_encode(array('status' => 'fails'));
}
