<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class VisitorsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        //$written_by = Written_By::all();

        return view('visitors', compact('books', 'authors'));
    }
}
