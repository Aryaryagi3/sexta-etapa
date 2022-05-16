<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;

class BorrowController extends Controller
{
    public function index()
    {
        $currentUser =  auth()->user();
        $borrow = $currentUser->borrows()->where('returned', 0)->paginate(5);
        $books = $currentUser->books()->paginate(5);
        $user = $currentUser->name;

        return view('borrow.index', ['borrow' => $borrow, 'books' => $books, 'user' => $user]);
    }

    public function store()
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $book = Book::create($data);
        
        $borrow = new Borrow();

        $book = Book::find(request('book-id'));

        $borrow->book_id = request('book-id');
        $borrow->user_id = auth()->user()->id;

        $book->available = 0;

        $book->save();
        $borrow->save();
        return redirect('/borrow');
    }

    public function update(Borrow $borrow)
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $book = Book::find($borrow->book_id);

        $borrow->returned = 1;
        $borrow->return_date = $current_date_time;

        $book->available = 1;

        $book->save();
        $borrow->save();

        return redirect('/borrow');
    }
}
