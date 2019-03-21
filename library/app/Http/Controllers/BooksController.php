<?php

namespace App\Http\Controllers;

use App\User;
use App\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
		$user_id = Auth::user()->id;

		if (is_null($book)) {
			abort(404);
		}

		$comments = DB::table('comments')
                ->where('book_id', $id)
                ->get();

		$subscriptions = DB::table('subscriptions')
				-> where('book_id', $id)
				-> where('user_id', $user_id)
				-> get();

		return view('books.show', compact('book', 'comments', 'subscriptions'));
	}

	public function sub($book_id)
	{
		$user_id = Auth::user()->id;

        $subscription = new Subscription();
        $subscription->user_id = $user_id;
        $subscription->book_id = $book_id;
        $subscription->save();

        $url = 'books/' . $book_id;
        return redirect($url);
	}
}
