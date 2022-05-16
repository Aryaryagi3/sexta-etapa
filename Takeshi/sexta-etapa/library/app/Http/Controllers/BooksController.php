<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

use App\Actions\SaveBookCoverAction;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::paginate(20);
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $book = Book::create($data);

        if($book->cover)
        {
            (new SaveBookCoverAction())->execute($request, $book);
        }

        return redirect('/books');
    }

    public function edit(Book $book)
    {
        $this->authorize('edit', $book);

        return view('books.edit', ['book' => $book]);
    }

    public function update(Book $book, BookRequest $request)
    {
        $this->authorize('post', $book);

        $data = $request->validated();
        $book->update($data);

        if($book->cover)
        {
            (new SaveBookCoverAction())->execute($request, $book);
        }

        return redirect('/borrow');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();
        return redirect('/borrow');
    }
}
