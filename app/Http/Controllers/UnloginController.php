<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UnloginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function index()
     {
       return view('default', [
         'books'=>Book::orderBy('created_at', 'desc')->paginate(5)
       ]);
     }
     public function show($id)
     {
       //var_dump($id);
       $book = Book::where('id', $id)->first();
       return view('show',[
         'book'=>$book,
         'authors' => Author::get(),
         'delimiter'  => ''
       ]);
     }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
