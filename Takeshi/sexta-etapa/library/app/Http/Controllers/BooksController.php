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

    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show', ['book' => $book]);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(request $request)
    {
        $book = new Book();

        $book->title = request('title');
        $book->author = request('author');
        $book->brought_by = request('brought-by');
        
        if($request->hasFile('cover') && $request->file('cover')->isValid())
        {
            $requestImage = $request->cover;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/covers'), $imageName);

            $book->cover = $imageName;
        }
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
        $book->past_owner_name = request('brought-by');
        $book->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $book = Book::find($id)->delete();

        return redirect('/');
    }
}
