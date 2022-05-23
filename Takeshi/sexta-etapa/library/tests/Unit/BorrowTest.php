<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Borrow;

class BorrowTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_if_borrow_columns_are_correct()
    {
        $borrow = new Borrow;

        $expected = [
            'book_id',
            'user_id'
        ];

        $comparedArray = array_diff($expected, $borrow->getFillable());

        $this->assertEquals(0, count($comparedArray));
    }
}
