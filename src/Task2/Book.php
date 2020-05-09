<?php

declare(strict_types=1);

namespace App\Task2;

use phpDocumentor\Reflection\DocBlock\ExampleFinder;

class Book{
    protected string $title;
    protected int $price;
    protected int $number;
    public function __construct(string $title,int $price,int $number){
        $this->title = $title;
        $this->price = $price;
        $this->number = $number;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function getPrice(): int{
        return $this->price;
    }

    public function getPagesNumber(): int{
        return $this->number;
    }
}