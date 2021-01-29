<pre>
<?php

//функция перобразования русского текста в имени файла в транслит
function translitNameFile($s) {
    $s = (string) $s; // преобразуем в строковое значение
    $s = strip_tags($s); // убираем HTML-теги
    $posEx = strripos($s, '.'); // находим позицию, где начниается расширение файла
    $ex = mb_strcut($s, $posEx); // получаем расширение файла
    $s = str_replace($ex, '', $s); // удаляем расширение из названия файла
    $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
    $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
    $s = trim($s); // убираем пробелы в начале и конце строки
    $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
    $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
    $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
    $s = $s . $ex; // добавляес расширение к имени файла
    return $s; // возвращаем результат
  }

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

    // Преобразование русских имен файлов в транслит
    $_FILES['images']['name'] = array_map('translitNameFile', $_FILES['images']['name']);

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