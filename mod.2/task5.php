<?php

$city1 = 50;
$city1Radius = 10;
$city2 = 500;
$city2Radius = 100;

for ($i = 0; $i < 10; $i++) {
    $posotionCar = rand(0, 1000);
    if ( ( $posotionCar > ($city1 - $city1Radius) && $posotionCar < ($city1 + $city1Radius) ) || ( $posotionCar > ($city2 - $city2Radius) && $posotionCar < ($city2 + $city2Radius)) ) { ?>
        <p>Машина <?php echo $i ?> едет по городу на <?php echo $posotionCar ?>км со скоростью не более 70 км/час</p> 
    <?php } else { ?>
        <p>Машина <?php echo $i ?> едет по трассе на <?php echo $posotionCar ?>км со скоростью не более 90 км/час</p> <?php
    }
};
