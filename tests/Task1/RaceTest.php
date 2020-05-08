<?php

declare(strict_types=1);

namespace Tests\Task1;

use App\Task1\Car;
use App\Task1\Track;
use PHPUnit\Framework\TestCase;

class RaceTest extends TestCase
{
    private Track $track;
    private Car $car1;
    private Car $car2;

    protected function setUp(): void
    {
        parent::setUp();

        $this->track = new Track(20, 50);

        $this->car1 = new Car(
            1,
            'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
            'BMW',
            250,
            10,
            5,
            15
        );
        $this->car2 = new Car(
            2,
            'https://i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970.jpg',
            'Tesla',
            200,
            5,
            5.3,
            18
        );
    }

    public function testAll()
    {
        $this->track->add($this->car1);
        $this->track->add($this->car2);
        $this->assertCount(2, $this->track->all());
    }

    public function testAdd()
    {
        $this->track->add($this->car1);
        $this->track->add($this->car2);
        $this->assertEquals($this->car1->getId(), $this->track->all()[0]->getId());
        $this->assertEquals($this->car2->getId(), $this->track->all()[1]->getId());
    }

    public function carsDataProvider(): array
    {
        return [
            [
                new Car(
                    1,
                    'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
                    'BMW',
                    250,
                    10,
                    5,
                    15
                ),
                new Car(
                    2,
                    'https://i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970.jpg',
                    'Tesla',
                    200,
                    5,
                    5.3,
                    18
                )
            ],
            [
                new Car(
                    1,
                    'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
                    'BMW',
                    250,
                    10,
                    5,
                    15
                ),
                new Car(
                    3,
                    'https://fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256.jpg',
                    'Ford',
                    220,
                    5,
                    6.1,
                    18.5
                ),
            ],
            [
                new Car(
                    3,
                    'https://fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256.jpg',
                    'Ford',
                    230,
                    5,
                    4,
                    25
                ),
                new Car(
                    1,
                    'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
                    'BMW',
                    250,
                    40,
                    35,
                    10
                ),
            ]
        ];
    }

    /**
     * @dataProvider carsDataProvider
     */
    public function testStart(Car $car1, Car $car2)
    {
        $this->track->add($car1);
        $this->track->add($car2);
        $this->assertEquals($car1, $this->track->run());
    }
}