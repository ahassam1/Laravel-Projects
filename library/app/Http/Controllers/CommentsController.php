<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use Request;
use Carbon\Carbon;

class CommentsController extends Controller
{
	public function index() {
		$comments = Comment::all();

		return view('comments.index', compact('comments'));
	}

	public function show($id) {
		$comment = comment::findOrFail($id);

		return view('comments.show', compact('comment'));
	}
    
    public function create()
    {
        return view('comments.create');
    }

    public function store() {
    	// maybe should pass userid, bookid to the thing?
    	$input = Request::all();
    	$input['id'] = 1;
       	$input['user_id'] = 1;
    	$input['book_id'] = 1;
    	$input['created_at'] = Carbon::now();
    	$input['updated_at'] = Carbon::now();

    	Comment::create($input);

    	return redirect('comments');
    }
}
