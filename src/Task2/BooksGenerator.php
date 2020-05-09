<?php

declare(strict_types=1);

namespace App\Task2;

class BooksGenerator{
    protected int $minPagesNumber;
    protected int $maxPrice;
    protected array $libraryBooks = [];
    protected array $storeBooks = [];

    public function __construct(int $minPagesNumber,int $maxPrice,array $libraryBooks,array $storeBooks){
        $this->minPagesNumber = $minPagesNumber;
        $this->maxPrice = $maxPrice;
        $this->libraryBooks = $libraryBooks;
        $this->storeBooks = $storeBooks;
    }

    public function generate(): \Generator{
        //@todo
    }
}