<?php
$menu = [
  [
    'title' => 'Главная',
    'path' => '/',
    'sort' => 0
  ],
  [
    'title' => 'О нас',
    'path' => '/route/about-us/',
    'sort' => 1
  ],
  [
    'title' => 'Контакты',
    'path' => '/route/contacts/',
    'sort' => 2
  ],
  [
    'title' => 'Новости',
    'path' => '/route/news/',
    'sort' => 3
  ],
  [
    'title' => 'Каталог',
    'path' => '/route/katalog/',
    'sort' => 4
  ],
  [
    'title' => 'Инофрмация',
    'path' => '/route/info/',
    'sort' => 5
  ],
];

function arraySort($array, $key, $sort) {
  usort($array, function($a, $b){
    return ($a[$key] > $b[$key]);   
  });
  return $array;
};

function showMenu($menu, $isInHeader=true) {
  if ($isInHeader) {
    $menu = arraySort($menu, 'sort', 'SORT_ASC');
    ?>
      <ul class='main-menu'>
          <?php
            foreach ($menu as $itemMenu) {
              ?><li><a href="<?=$itemMenu['path']?>"><?=$itemMenu['title']?></a></li><?php
            }
          ?>
      </ul>        
    <?php   
  } else {

    ?>
      <ul class='main-menu bottom'>
          <?php
            foreach ($menu as $itemMenu) {
              ?><li><a href="<?=$itemMenu['path']?>"><?=$itemMenu['title']?></a></li><?php
            }
          ?>
      </ul>        
    <?php

  }
};
