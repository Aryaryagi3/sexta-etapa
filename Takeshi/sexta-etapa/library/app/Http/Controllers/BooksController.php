<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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

    public function store(request $request)
    {
        $book = new Book();

        $book->title = request('title');
        $book->author = request('author');
        $book->user_id = auth()->user()->id;
        
        if($request->hasFile('cover') && $request->file('cover')->isValid())
        {
            $request_image = $request->cover;
            $extension = $request_image->extension();

            $image_name = md5($request_image->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $request_image->move(public_path('img/covers'), $image_name);

            $book->cover = $image_name;
        }
        $book->save();

        return redirect('/books');
    }

    public function edit(Book $book)
    {
        $this->authorize('edit', $book);

        return view('books.edit', ['book' => $book]);
    }

    public function update(Book $book, request $request)
    {
        $this->authorize('post', $book);

        $book->title = request('title');
        $book->author = request('author');
        
        if($request->hasFile('cover') && $request->file('cover')->isValid())
        {
            $request_image = $request->cover;
            $extension = $request_image->extension();

            $image_name = md5($request_image->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $request_image->move(public_path('img/covers'), $image_name);

            $book->cover = $image_name;
        }
        $book->save();

        return redirect('/borrow');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/borrow');
    }
}
