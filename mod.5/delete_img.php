<?php

var_dump($_POST);
$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';
unlink($uploadPath.'basket.png');


?>