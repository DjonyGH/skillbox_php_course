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
  usort($array, function($a, $b) use($key, $sort) {
    if ($sort === 'SORT_ASC') {
      return ($a[$key] > $b[$key]);
    } elseif ($sort === 'SORT_DESC') {}
      return ($a[$key] < $b[$key]);
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
              ?>
                <li>
                  <a href="<?=$_SESSION['isAuth']===true ?  $itemMenu['path'] : '/'?>" style="font-size: 16px;<?= ($_SERVER['REQUEST_URI'] === $itemMenu['path']) ? "text-decoration: underline" : "text-decoration: none" ?>">
                    <?=$itemMenu['title']?>
                  </a>
                </li>
              <?php
            }
          ?>
      </ul>        
    <?php   
  } else {
    $menu = arraySort($menu, 'title', 'SORT_ASC');
    ?>
      <ul class='main-menu bottom'>
          <?php
            foreach ($menu as $itemMenu) {
              ?>
                <li>
                  <a href="<?=$_SESSION['isAuth']===true ?  $itemMenu['path'] : '/'?>" style="font-size: 12px;">
                    <?=$itemMenu['title']?>
                  </a>
                </li>
              <?php
            }
          ?>
      </ul>        
    <?php

  }
};


foreach ($menu as $itemMenu) {
  if ($_SERVER['REQUEST_URI'] === $itemMenu['path']) {
      $title = $itemMenu['title'];
  };
};
