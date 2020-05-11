<?php

declare(strict_types=1);

namespace App\Task2;

class BooksGenerator{
    protected int $minPagesNumber;
    protected int $maxPrice;
    protected array $libraryBooks = [];
    protected array $storeBooks = [];
    public function __construct(int $minPagesNumber,array $libraryBooks,int $maxPrice,array $storeBooks){
        try {
            if ($minPagesNumber < 0) {
                throw new \Exception('ERROR the value minPagesNumber must be greater than zero');
            }
            if ($maxPrice < 0 ) {
                throw new \Exception('ERROR the value maxPrice must be greater than zero');
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        $this->minPagesNumber = $minPagesNumber;
        $this->maxPrice = $maxPrice;
        $this->libraryBooks = $libraryBooks;
        $this->storeBooks = $storeBooks;
    }
    public function generate(): \Generator{
        foreach ($this->libraryBooks as $book) {
            if ($book->getPagesNumber() >= $this->minPagesNumber) {
                yield $book;
            }
        }
        foreach ($this->storeBooks as $book) {
            if ($book->getPrice() < $this->maxPrice) {
                yield $book;
            }
        }
    }
}
