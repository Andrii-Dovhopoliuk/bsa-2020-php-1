<?php

declare(strict_types=1);

namespace App\Task1;

class Track{
    private $lapLength;
    private $lapsNumber;
    private $cars = [];
    public function __construct(float $lapLength, int $lapsNumber){
        try {
            if ($lapLength < 0) {
                throw new \Exception('ERROR the value lapLength must be greater than zero');
            }
            if ($lapsNumber < 0 ) {
                throw new \Exception('ERROR the value lapsNumber must be greater than zero');
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        $this->lapLength = $lapLength;
        $this->lapsNumber = $lapsNumber;
    }

    public function getLapLength(): float{
        return $this->lapLength;
    }

    public function getLapsNumber(): int{
        return $this->lapsNumber;
    }

    public function add(Car $car): void{
        $this->cars[] = $car;
    }

    public function all(): array{
        return $this->cars;
    }

    public function run(): Car{
        $cars = $this->all();
        $time = [];
        foreach ($cars as $k => $car){
            $id = $car->getId();
            $image = $car->getImage();
            $name = $car->getName();
            $speed = $car->getSpeed();
            $PitStopTime = $car->getPitStopTime();
            $FuelConsumption = $car->getFuelConsumption();
            $FuelTankVolume = $car->getFuelTankVolume();
            $way = $this->lapsNumber * $this->lapLength;
            $travelTime = round($way / $speed,3)*3600;
            $travelTime += $PitStopTime * (ceil ((( $way * $FuelConsumption * 0.01) / $FuelTankVolume))-1);//"-1" because at the start all the cars are refueled
            $time[$k] = $travelTime;
        }
        return $this->all()[array_search(min($time), $time)];
    }
}

