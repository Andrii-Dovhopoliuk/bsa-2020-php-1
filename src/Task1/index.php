<?php
require __DIR__ . "/../../vendor/autoload.php";
use App\Task1\Car;
use App\Task1\Track;
$bmw = new Car(
    1,
    "https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg",
    'BMW',
    220,
    40,
    7,
    60,
);
$tesla = new Car(
    2,
    "https://i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970.jpg",
    'Tesla',
    200,
    2000,
    7,
    40,
);
$ford = new Car(
    3,
    "https://fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256.jpg",
    'Ford',
    240,
    50,
    9,
    70,
);
$track1 = new Track(2000,2);
$track1->add($bmw);
$track1->add($tesla);
$track1->add($ford);
?><pre><?php print_r($track1->run());?></pre><?php

