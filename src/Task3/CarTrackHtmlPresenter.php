<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task1\Car;
use App\Task1\Track;

class CarTrackHtmlPresenter{
    public function present(Track $track): string{
        $content = '<div class="center">';
        $cars = $track->all();
        foreach ($cars as $k){
            $content .= '<div class="car">';
            $content .= '<p class="name">'. $k->getName() .'</p>';
            $content .= '<img class="img1" src="'.$k->getImage().'" alt="">';
            $content .= ' <div class="info">Speed:' . $k->getSpeed() . '</div>';
            $content .= ' <div class="info">pitStopTime:' . $k->getPitStopTime() . '</div>';
            $content .= ' <div class="info">fuelConsumption:' . $k->getFuelConsumption() . '</div>';
            $content .= '</div>';
        }
        $content .= '</div>';
        return $content;
    }

}
