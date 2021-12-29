<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function index()
    {
        // TODO 情報をとって来て、一覧表示をしたい。
//        $books = Book::all()->sortByDesc('created_at');
        $books = Book::latest('created_at')->paginate(10);
//        $books = DB::table('books')->paginate(10);
//        dd($books);
        return view('index', ['books' => $books]);
    }
    public function search()
    {
        return view('books.searchshow');
    }
    public function searchcreate(Request $request)
    {
        return view('books.search_create');
    }

    public function create()
    {
        return view('books.create');
    }
    public function store(BookRequest $request, Book $book)
    {
        $book->fill($request->all());
        $book->user_id = $request->user()->id;
        $book->save();
        return redirect()->route('home');
    }
    public function searchstore(BookRequest $request, Book $book)
    {
        $book->fill($request->all());
        $book->user_id = $request->user()->id;
//        dd($book);
        $book->save();
//        return redirect()->route('home');
    }

    public function destroy()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
}
