<?php
define('mb', 1048576);

function filterrequest($request)
{
    return htmlspecialchars(strip_tags($_POST[$request]));
}


function imageUpload($imageRequest)
{
    global $msgError;
    $imageName = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
    $imageTmp = $_FILES[$imageRequest]['tmp_name'];
    $imageSize = $_FILES[$imageRequest]['size'];
    $allowExt = array("jpg", "png", "jpeg", "gif");
    $strToArry = explode(".", $imageName);
    $ext = end($strToArry);
    $ext = strtolower($ext);
    if (!empty($imageName) && !in_array($ext, $allowExt)) {
        $msgError[] = "ext";
    }
    if ($imageSize > 10 * mb) {
        $msgError = "size";
    }
    if (empty($msgError)) {
        move_uploaded_file($imageTmp, "../upload/" . $imageName);
        return $imageName;
    } else {
        return "fail";
    }
}

function deleteFile($dir, $imageName)
{
    if (file_exists($dir . "/" . $imageName)) {
        unlink($dir . "/" . $imageName);
    }
}
