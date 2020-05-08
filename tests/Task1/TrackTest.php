<?php

declare(strict_types=1);

namespace Tests\Task1;

use App\Task1\Car;
use App\Task1\Track;
use PHPUnit\Framework\TestCase;

class TrackTest extends TestCase
{
    public function trackDataProvider(): array
    {
        return [
            [
                2,
                10
            ],
        ];
    }

    /**
     * @dataProvider trackDataProvider
     */
    public function testCreateTrack(
        float $lapLength,
        int $lapsNumber
    ) {
        $track = new Track($lapLength, $lapsNumber);

        $this->assertEquals($lapLength, $track->getLapLength());
        $this->assertEquals($lapsNumber, $track->getLapsNumber());
    }
}