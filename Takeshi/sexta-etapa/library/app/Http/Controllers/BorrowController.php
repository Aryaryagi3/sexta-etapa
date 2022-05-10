<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function store(Request $request, $id)
    {
        $borrow = new Borrow();

        $borrow->user_id = request('title');
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
    }

    public function update(Request $request, $id)
    {
        //
    }
}
