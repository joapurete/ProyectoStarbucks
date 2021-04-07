<?php
//URL Raiz_________________________________________________________________________________________________________________________________________________________
function getUrl()
{
    return URL;
}
//Formato Array____________________________________________________________________________________________________________________________________________________
function dep($data)
{
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}
//Pass Generator___________________________________________________________________________________________________________________________________________________
function getPasswordGenerator($length = 10)
{
    $pass = '';
    $str = 'ABDCEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxys1234567890';
    $lenghtStr = strlen($str);
    for ($i = 1; $i <= $length; $i++) {
        $pos = rand(0, $lenghtStr - 1);
        $pass .= substr($str, $pos, 1);
    }
    return $pass;
}
//Token____________________________________________________________________________________________________________________________________________________________
function getToken()
{
    $token = '';
    for ($i = 0; $i <= 3; $i++) {
        $r = bin2hex(random_bytes(10));
        $token .= $r . '-';
    }
    $token = trim($token, '-');
    return $token;
}
//Formato $________________________________________________________________________________________________________________________________________________________
function getFormatMoney($cant)
{
    $quant = number_format($cant, 2, SPD, SPM);
    return S_MONEY . $quant;
}
//Validación Imagen_________________________________________________________________________________________________________________________________________________
function checkProfileImage($imageType, $imageSize)
{
    $result =  array();
    if ($imageType != 'image/apn' && $imageType != 'image/avif' && $imageType != 'image/gif' && $imageType != 'image/jpeg' && $imageType != 'image/png' && $imageType != 'image/svg+xml' && $imageType != 'image/webp') {
        return $result = setMessageArray('error', 'errorImage');
    } else if ($imageSize > 1000000) {
        return $result = setMessageArray('error', 'largeImage');
    } else {
        return $result = setMessageArray('success', 'success');
    }
}
//Quitar Imagen____________________________________________________________________________________________________________________________________________________
function deleteImage($image, $dir)
{
    if ($image != false) {
        $image = $dir . $image;
        if (file_exists($image)) {
            unlink($image);
        }
    }
}
//URL Imagen_______________________________________________________________________________________________________________________________________________________
function getDirImage($imageName, $dir)
{
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    $idGenerated = uniqid();
    $dir = array(
        'dir' => $dir . $idGenerated . $imageName,
        'dir_db' =>  $idGenerated . $imageName
    );
    return $dir;
}
//Hash______________________________________________________________________________________________________________________________________________________________
function setHash($password)
{
    return password_hash($password, PASSWORD_DEFAULT, array('cost' => 12));
}
//Validación Hash___________________________________________________________________________________________________________________________________________________
function validateHash($password, $passwordHash)
{
    if (password_verify($password, $passwordHash)) {
        return true;
    } else {
        return false;
    }
}
//Array View_______________________________________________________________________________________________________________________________________________________
function setViewArray($view, $folder)
{
    return $view = array(
        'page' => $view,
        'folder' => $folder
    );
}
//Array Message____________________________________________________________________________________________________________________________________________________
function setMessageArray($status, $type, $msj = '')
{
    return $response = array(
        'status' => $status,
        'type' => $type,
        'msj' => $msj
    );
}
//Status Badge____________________________________________________________________________________________________________________________________________________
function getStatusBadge($status)
{
    if ($status == 1) {
        echo '<span class="badge badge-success">Disponible</span>';
    } else {
        echo '<span class="badge badge-danger">Agotado</span>';
    }
}
