<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowRequest;
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

    public function store(BorrowRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Borrow::create($data);

        $book = Book::find($data['book_id']);
        $book->available = 0;
        $book->update();
        
        return redirect('/borrow');
    }

    public function update(Borrow $borrow)
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $borrow->returned = 1;
        $borrow->return_date = $current_date_time;

        $book = Book::find($borrow->book_id);
        $book->available = 1;

        $book->update();
        $borrow->update();

        return redirect('/borrow');
    }
}
