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
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'price' => 'numeric|required',
        ];
        $messages = [
            'title.required' => 'タイトルは必ず入力',
            'author.required' => '著者は必ず入力',
            'price.numeric' => '価格を整数で入力',
            'price.required' => '価格は必ず入力',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
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
    public function search(Request $request)
    {
        $searchrules = [
            'search_title' => 'required_without_all:search_author,search_price',
            'search_author' => 'required_without_all:search_title,search_price',
            'search_price' => 'nullable|sometimes|numeric|min:0|required_without_all:search_title,search_author',
            'price_option' => 'required_with:search_price|in:exact,above,below',
        ];




        $searchmessages = [
            'search_title.required_without_all' => 'タイトルを入力してください',
            'search_author.required_without_all' => '著者名を入力してください',
            'search_price.required_without_all' => '価格を入力してください',
            'search_price.numeric' => '価格は数値で入力してください。',
            'search_price.min' => '価格は0以上で入力してください。',
            'price_option.required_with' => '価格オプションを選択してください。',
            'price_option.in' => '無効な価格オプションが選択されました。',
        ];

        $searchvalidator = Validator::make($request->all(), $searchrules, $searchmessages);

        if ($searchvalidator->fails()) {
            return redirect('/books')
                ->withErrors($searchvalidator)
                ->withInput();
        }

        $query = Book::query();

        if ($request->input('search_title')) {
            $query->where('title', 'like', "%" . $request->input('search_title') . "%");
        }

        if ($request->input('search_author')) {
            $query->where('author', 'like', "%" . $request->input('search_author') . "%");
        }

        if ($request->input('search_price')) {
            $price = $request->input('search_price');
            $option = $request->input('price_option');

            switch ($option) {
                case 'above':
                    $query->where('price', '>=', $price);
                    break;
                case 'below':
                    $query->where('price', '<', $price);
                    break;
                case 'exact':
                    $query->where('price', '=', $price);
                    break;
            }
        }
        $searchbooks = $query->get();
        //dd($searchbooks);

        $searchResultCount = $searchbooks->count();

        $books = Book::all();
        // 変更後のコード
        return view('books.index', [
            'books' => $books,
            'searchbooks' => $searchbooks,
            'searchResultCount' => $searchResultCount,
            'searchConditions' => $request->all()
        ]);
    }
}
