<?php

$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';
// массив для файлов с расширением jpeg, jpg, png
$images = [];
foreach (scandir($uploadPath) as $file) {
    $posEx = strripos($file, '.');
    $ex = mb_substr($file, $posEx);
    if ($ex === '.jpg' || $ex === '.jpeg' || $ex === '.png') {
        array_push($images, $file);
    }
};


if ($_GET['delete'] === 'true') {
    var_dump($_REQUEST);
    // $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';
    unlink($uploadPath.'basket.png');
}

var_dump($_REQUEST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImageUploader</title>
    <link rel="stylesheet" href="/styles/css.css">
    <script src="/scripts/main.js" defer></script>
</head>
<body>
    <div class="wrapperImg">
        <button id="btnDeleteImg">Удалить</button>
        <?php foreach ($images as $image) {
            ?> 
                <div class="imgBox">
                    <img src="<?= '../upload/'.$image ?>"/>
                    <p><?= $image ?></p>
                    <input type="checkbox" class="chbDelete" name="<?= $image ?>" id="<?= 'id-'.$image ?>">
                </div>            
            <?php
        }?>   

    </div>
    
</body>
</html>