<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;

class BorrowController extends Controller
{
    public function index()
    {
        $borrow = Borrow::where('user_id', auth()->id())->where('returned', 0)->paginate(5);
        $books = Book::where('user_id', auth()->id())->paginate(5);
        $user = auth()->user()->name;

        return view('borrow.index', ['borrow' => $borrow, 'books' => $books, 'user' => $user]);
    }

    public function store()
    {
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
