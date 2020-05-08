<?php

namespace Tests\Task3;

use PHPUnit\Framework\TestCase;

class BuiltInServerTest extends TestCase
{
    const TEST_REGEX = '%<img src=\"https:\/\/(pbs.twimg.com\/profile_images\/595409436585361408\/aFJGRaO6_400x400|i.pinimg.com\/originals\/e4\/15\/83\/e41583f55444b931f4ba2f0f8bce1970|fordsalomao.com.br\/wp-content\/uploads\/2019\/02\/1499441577430-1-1024x542-256x256)\.jpg\">%';

    private BuiltInServerRunner $runner;

    protected function setUp(): void
    {
        parent::setUp();

        $this->runner = new BuiltInServerRunner();
        $this->runner->start();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->runner->stop();
    }

    public function testBuiltInServerRuns()
    {
        $page = file_get_contents(BuiltInServerRunner::TEST_ENDPOINT);

        $this->assertStringContainsString('<title>Built-in Web Server</title>', $page);
    }

    public function testShowsAll()
    {
        $page = file_get_contents(BuiltInServerRunner::TEST_ENDPOINT);
        $this->assertMatchesRegularExpression(self::TEST_REGEX, $page);
    }

    public function testFightersAmount()
    {
        $page = file_get_contents(BuiltInServerRunner::TEST_ENDPOINT);

        $matches = [];
        preg_match_all(self::TEST_REGEX, $page, $matches, PREG_SET_ORDER, 0);
        $this->assertCount(3, $matches);
    }

    public function testFightersInfoRendered()
    {
        $page = file_get_contents(BuiltInServerRunner::TEST_ENDPOINT);

        $matches = [];

        preg_match_all('/([\w\s-]+)\: (\d+), (\d+)/', $page, $matches, PREG_SET_ORDER, 0);

        $names = array_map(
            function ($match) {
                return $match[1];
            },
            $matches
        );

        $expected = ['BMW', 'Tesla', 'Ford'];

        $this->assertCount(3, $names);
        $this->assertCount(0, array_diff($expected, $names));
    }

    public function testFighterImageRendered()
    {
        $page = file_get_contents(BuiltInServerRunner::TEST_ENDPOINT);

        $matches = [];

        preg_match_all(self::TEST_REGEX, $page, $matches, PREG_SET_ORDER, 0);

        $imageIds = array_map(
            function ($match) {
                return $match[1];
            },
            $matches
        );

        $expected = [
            'pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400',
            'i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970',
            'fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256'
        ];

        $this->assertCount(3, $imageIds);
        $this->assertCount(0, array_diff($expected, $imageIds));
    }
}