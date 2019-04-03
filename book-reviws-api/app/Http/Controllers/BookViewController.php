<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\WrittenBy;
use DB;
use App\Quotation;

class BookViewController extends Controller
{


    public function index()
    {
        /*
        $books = DB::table('Books');
        $authors = DB::table('Author');
        $writtenby = DB::table('writtenby');

        //$authors -> renameColumn('name', 'a_name');

        $data = DB::table('writtenby')
            -> join('books', 'book_id', '=', 'id')
            -> join('authors', 'author_id', '=', 'a_id')
            -> get();
        */
        return view('bookview');
    }
}
