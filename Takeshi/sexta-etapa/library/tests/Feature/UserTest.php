<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_only_logged_users_can_enter_books_list()
    {
        $response = $this->get('/books')
            ->assertRedirect('/login');
    }

    public function test_only_logged_users_can_register_books()
    {
        $response = $this->get('/books/create')
            ->assertRedirect('/login');
    }
}
