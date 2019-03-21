<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Request;
use Carbon\Carbon;

use DB;

class CommentsController extends Controller
{
	public function index($book_id) {
        $comments = DB::table('comments')->get();
        $url = 'books/' . $book_id;

        $comments = DB::table('comments')
                ->where('book_id', $book_id)
                ->get();

		return view($url, compact('comments'));
	}
    
    public function create($book_id) {
        return view('comments.create', compact('book_id'));
    }

    public function store($book_id) {
        $user_id = Auth::user()->id;

        $comment = new Comment();
        $comment->book_id = $book_id;
        $comment->user_id = $user_id;
        $comment->text = request('text');
        $comment->created_at = Carbon::now()->toDateTimeString();
        $comment->updated_at = Carbon::now()->toDateTimeString();

        $comment->save();

        $url = 'books/' . $book_id;

        return redirect($url);
    }
}
