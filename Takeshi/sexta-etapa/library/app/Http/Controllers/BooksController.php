<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::paginate(50);
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store()
    {
        $book = new Book();

        $book->title = request('title');
        $book->author = request('author');
        $book->past_owner_name = request('past-owner-name');
        $book->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', ['book' => $book]);
    }

    public function update($id)
    {
        $book = Book::find($id);

        $book->title = request('title');
        $book->author = request('author');
        $book->past_owner_name = request('past-owner-name');
        $book->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $book = Book::find($id)->delete();

        return redirect('/');
    }
}
