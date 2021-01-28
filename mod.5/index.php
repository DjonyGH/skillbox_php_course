<pre>
<?php

if (isset($_POST['upload'])) {
    var_dump($_FILES);
    $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/upload/';
    $uploadError = false;

    // Проверка на наличие ошибок при загрузке файлов
    foreach ($_FILES['images']['error'] as $error) {
        !$error ?: $uploadError = true;
    };

    // Проверка на типы файлов
    foreach ($_FILES['images']['type'] as $type) {
        if ($type != 'image/png' && $type != 'image/jpg' && $type != 'image/jpeg' ) {
            $uploadError = true;
        }
    };

    // Проверка на количество загружаемых файлов(<5)
    if (count($_FILES['images']['name']) > 5) {
        $uploadError = true;
    };

    // Проверка на размеры файлов
    foreach ($_FILES['images']['size'] as $size) {
        if ($size > 5000000 ) {
            $uploadError = true;
        }
    };

    if (!empty($uploadError)) {
        echo "Error :(";
    } else {
        for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
            move_uploaded_file($_FILES['images']['tmp_name'][$i], $uploadPath.$_FILES['images']['name'][$i]);
        }        
    };

}

?>
</pre>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImageUploader</title>
    <link rel="stylesheet" href="/styles/css.css">
    <!-- <script src="/scripts/main.js" defer></script> -->
</head>
<body>
    <form
        class="wrapper"
        enctype="multipart/form-data"
        method="POST"
        action="<?=$_SERVER['PHP_SELF']?>"
    >
        <label for="selectImg">Select Image</label>
        <input type="file" name="images[]" id="selectImg" accept="jpg, png, jpeg" multiple>
        <button id="downloadImg" type="submit" name="upload">Download</button>
    </form>
    <div class="wrapper">
        <a class="linkToImg" href="/images/">Картинки</a>
    </div>
    
</body>
</html>