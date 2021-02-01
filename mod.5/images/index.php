<?php

$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';
// массив для файлов с расширением jpeg, jpg, png
$images = [];

// заполняем массив $images именами файлов-изображений, которые находятся в папке upload
foreach (scandir($uploadPath) as $file) {
    $posEx = strripos($file, '.');
    $ex = mb_substr($file, $posEx);
    if ($ex === '.jpg' || $ex === '.jpeg' || $ex === '.png') {
        array_push($images, $file);
    }
};

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
                    <div>
                        <input type="checkbox" class="chbDelete" name="<?= $image ?>" id="<?= 'id-'.$image ?>">
                        <label for="<?= $image ?>">Удалить</label>
                    </div>                    
                </div>            
            <?php
        }
        if (count($images) < 1) {
            ?>
                <p>Нет загруженных изображений</p>
                <div class="wrapper">
                    <a class="linkToImg" href="/">Загрузить изображения</a>
                </div>
            <?php
        }
        ?>   

    </div>
    
</body>
</html>