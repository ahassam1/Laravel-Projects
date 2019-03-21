<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use DB;

class BooksController extends Controller
{
	public function index() {
		$books = Book::all();

		return view('books.index', compact('books'));
	}

	public function show($id)
	{
		$book = Book::find($id);

		if (is_null($book)) {
			abort(404);
		}

		$comments = DB::table('comments')
                ->where('book_id', $id)
                ->get();

		return view('books.show', compact('book', 'comments'));
	}
}
