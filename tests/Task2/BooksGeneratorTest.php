<?php

declare(strict_types=1);

namespace Tests\Task2;

use App\Task2\Book;
use App\Task2\BooksGenerator;
use PHPUnit\Framework\TestCase;

class BooksGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function booksCreationDataProvider(): array
    {
        return [
            [
                'War and Piece',
                100,
                500
            ],
        ];
    }

    /**
     * @dataProvider booksCreationDataProvider
     */
    public function testCreateBook(string $title, int $price, int $pagesNumber)
    {
        $book = new Book(
            $title,
            $price,
            $pagesNumber
        );

        $this->assertEquals($title, $book->getTitle());
        $this->assertEquals($price, $book->getPrice());
        $this->assertEquals($pagesNumber, $book->getPagesNumber());
    }

    public function booksGenerationDataProvider(): array
    {
        return [
            [
                50,
                [
                    new Book('Don Quixote', 100, 100),
                    new Book('The Great Gatsby', 50, 50),
                    new Book('Harry Potter', 20, 20)
                ],
                60,
                [
                    new Book('Hamlet', 150, 30),
                    new Book('Crime and Punishment', 600, 50),
                    new Book('Pride and Prejudice', 40, 60)
                ],
                [
                    new Book('Don Quixote', 100, 100),
                    new Book('The Great Gatsby', 50, 50),
                    new Book('Pride and Prejudice', 40, 60)
                ]
            ]
        ];
    }

    /**
     * @dataProvider booksGenerationDataProvider
     */
    public function testBooksYieldsCorrectly(
        int $minPagesNumber,
        array $libraryBooks,
        int $maxPrice,
        array $storeBooks,
        array $filteredBooks
    ) {
        $generator = new BooksGenerator($minPagesNumber, $libraryBooks, $maxPrice, $storeBooks);
        $generator = $generator->generate();

        $this->assertEquals($filteredBooks, iterator_to_array($generator,false));
    }
}