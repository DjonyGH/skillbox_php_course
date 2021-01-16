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

foreach ($result3['books'] as $book) {
    ?> <p> Книга: "<?php echo $book['name']; ?>", ее написал <?php foreach ($result3['authors'] as $author => $author_info) {
        if ($author === $book['author']) {
            echo $author_info['fio']; 
            echo $author_info['birthDay'];
        }
    } ?></p>
<?php
};


