<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    public function edit(User $user, Book $book)
    {
        return $this->canHandle($user, $book);
    }

    public function post(User $user, Book $book)
    {
        return $this->canHandle($user, $book);
    }

    public function delete(User $user, Book $book)
    {
        if ($book->available == 1) {
            return $this->canHandle($user, $book);
        } else {
            return false;
        }
    }

    private function canHandle(User $user, Book $book)
    {
        return $book->user_id == $user->id;
    }
}

