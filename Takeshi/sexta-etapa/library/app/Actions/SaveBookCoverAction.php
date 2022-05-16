<?php

namespace App\Actions;

use App\Models\Book;

class SaveBookCoverAction
{
    public function execute(object $request, Book $book)
    {
        $extension = $request->cover->extension();

        $image_name = md5($request->cover->getClientOriginalName() . strtotime('now')) . "." . $extension;

        $request->cover->move(public_path('img/covers'), $image_name);
        $book->update([
            'cover' => $image_name
        ]);

        return true;
    }
}