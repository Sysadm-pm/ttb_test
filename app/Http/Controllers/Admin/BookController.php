<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.books.index', [
        'books'=>Book::orderBy('created_at', 'desc')->paginate(10),


      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.books.create', [
        'book'=>[],
        'authors' => Author::get(),
        'delimiter'  => ''
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //var_dump($request->input('authors'));
      $book = Book::create($request->except('authors'));
      if($request->has('authors')) :
         $book->authors()->attach($request->input('authors'));
      endif;
      // return redirect()->route('admin.book.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show',['book'=>$book] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
      if ($book->created_by == Auth::user()->id){
        return view('admin.books.edit',[
          'book'=>$book,
          'authors' => Author::get(),
          'delimiter'  => ''
          ]);
      }
      return redirect()->route('admin.book.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
      $book->update($request->except('authors'));
      $book->authors()->detach();
      if($request->has('authors')) :
         $book->authors()->attach($request->input('authors'));
      endif;

      return redirect()->route('admin.book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
      $book->delete();
       return redirect()->route('admin.book.index');
    }
}
