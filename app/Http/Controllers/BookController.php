<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    public function index()
{
    $books = Book::all();
    return view('books.index', compact('books'));
}

public function store(Request $request)
{
    // $this->validate($request,Book::$rules);
    //     $books=new Book;
    //     $form=$request->all();
    //     unset($form['_token']);
    //     $books->fill($form)->save();
    //     return redirect('/books');

    // return redirect('/books');

    $rules=[
        'title' => 'required',
            'author' => 'required',
            'price' => 'numeric|required',
    ];
    $messages=[
        'title.required'=>'タイトルは必ず入力',
                'author.required'=>'著者は必ず入力',
                'price.numeric'=>'価格を整数で入力',
                'price.required'=>'価格は必ず入力',
    ];
    $validator=Validator::make($request->all(),$rules,$messages);
    if ($validator->fails()) {
        return redirect('/books')
                    ->withErrors($validator)
                    ->withInput();
    }

    $book = new Book;
    $form = $request->all();
    unset($form['_token']);
    $book->fill($form)->save();
    return redirect('/books');
}

public function destroy(Book $book)
{
    $book->delete();
    return redirect('/books');
}
}
