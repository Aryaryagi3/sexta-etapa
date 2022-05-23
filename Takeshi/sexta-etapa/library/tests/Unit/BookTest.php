<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Book;

class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_if_book_columns_are_correct()
    {
        $book = new Book;

        $expected = [
            'title',
            'author',
            'cover',
            'user_id'
        ];

        $comparedArray = array_diff($expected, $book->getFillable());

        $this->assertEquals(0, count($comparedArray));
    }
}
