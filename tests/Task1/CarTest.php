<?php

declare(strict_types=1);

namespace Tests\Task1;

use App\Task1\Car;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    public function carsDataProvider(): array
    {
        return [
            [
                1,
                'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
                'BMW',
                250,
                10,
                5,
                15
            ],
            [
                2,
                'https://i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970.jpg',
                'Tesla',
                200,
                5,
                5.3,
                18
            ],
            [
                3,
                'https://fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256.jpg',
                'Ford',
                220,
                5,
                6.1,
                18.5
            ],
        ];
    }

    /**
     * @dataProvider carsDataProvider
     */
    public function testCreateCar(
        int $id,
        string $image,
        string $name,
        int $speed,
        int $pitStopTime,
        float $fuelConsumption,
        float $fuelTankVolume
    ) {
        $car = new Car($id, $image, $name, $speed, $pitStopTime, $fuelConsumption, $fuelTankVolume);

        $this->assertEquals($id, $car->getId());
        $this->assertEquals($image, $car->getImage());
        $this->assertEquals($name, $car->getName());
        $this->assertEquals($speed, $car->getSpeed());
        $this->assertEquals($pitStopTime, $car->getPitStopTime());
        $this->assertEquals($fuelConsumption, $car->getFuelConsumption());
        $this->assertEquals($fuelTankVolume, $car->getFuelTankVolume());
    }
}