<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\WrittenBy;


use Illuminate\Http\Request;
use DB;

class BooksController extends Controller
{
	public function index() {
		$books = Book::all();
		$authors = Author::all();
		$writtenby = DB::table('writtenby');

		$data = DB::table('writtenby')
            -> join('books', 'book_id', '=', 'id')
            -> join('authors', 'author_id', '=', 'a_id')
            -> get();

		return view('books.index', compact('data'));
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
	public function sub($id, $role)
	{
		$user_id = Auth::user->id();
        $subscribedto = new SubscribedTo();

        $subscribedto->user_id = $user_id;
        $subscribedto->book_id = $id;
        $subscribedto->save();

        $url = 'books/' . $book_id;
        return redirect($url);
	}
}
