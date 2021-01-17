<?php

$result3 = [
    'authors' => [
        'pushkin@mail.ru' => [
            'fio' => 'Pushkin A.S.',
            'birthDay' => '26.05.1799'
        ],
        'gogol@mail.ru' => [
            'fio' => 'Gogol N.V.',
            'birthDay' => '01.04.1809'
        ],
        'lermontov@mail.ru' => [
            'fio' => 'Lermontov M.Y.',
            'birthDay' => '15.10.1814'
        ],    
    ],
    'books' => [
        [
            'name' => 'Evgeniy Onegin',
            'author' => 'pushkin@mail.ru'
        ],
        [
            'name' => 'Viy',
            'author' => 'gogol@mail.ru'
        ],
        [
            'name' => 'Hero of our time',
            'author' => 'lermontov@mail.ru'
        ],
    ]
];

$red = (bool)rand(0,1);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заголовок</title>
    <style type="text/css">.red {color: red;}</style>
</head>
<body>
<h1
<?php if ($red) {
    ?> class="red" <?php    
}?> 
>Заголовок</h1>
<div>Авторов на портале: <?php echo count($result3['authors'])?></div>
<!-- Выведите все книги -->
<?php
foreach ($result3['books'] as $book) {
    ?> <p> Книга: "<?php echo $book['name']; ?>", ее написал <?php echo $result3['authors'][$book['author']]['fio']; echo $result3['authors'][$book['author']]['birthDay']; ?></p>
<?php
};
?>

</body>
</html>
