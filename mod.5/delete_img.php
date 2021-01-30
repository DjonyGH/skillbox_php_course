<?php

$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';

// удаление выбранных (переданных в методе post) файлов из папки upload
if (isset($_REQUEST['delete'])) {

  ?>$_REQUEST: <?php
  var_dump($_REQUEST);

  ?>$_POST: <?php
  var_dump($_POST);
  // if ($_REQUEST['delete'] === 'true') {
  //     // $deletingImg = explode(',', $_REQUEST['deletedImg']);
  //     // var_dump($deletingImg);
  //     // unlink($uploadPath.'prtscr.jpg');  
  // }
}

?>