<?php

$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';

// удаление выбранных (переданных в методе post) файлов из папки upload
if (isset($_REQUEST['delete'])) {

  $deletingImg = file_get_contents('php://input');
  $deletingImgAsArray = json_decode($deletingImg);

  if ($_REQUEST['delete'] === 'true') {
    foreach ($deletingImgAsArray as $img) {
      unlink($uploadPath.$img); 
    }
  }
}

?>