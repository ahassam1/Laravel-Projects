<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store($video_key)
    {
        request()->validate([
            'content' => ['required', 'min:10'],
        ]);

        Comment::create([
            'user_id' => Auth::user()->id,
            'video_key' => $video_key,
            'content' => request('content'),
        ]);

        return redirect('/videos/' . $video_key);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Comment $comment)
    {
        $comment->text = request('text');
        $comment->updated_at = Carbon::now()->toDateTimeString();
        $comment->save();

        return redirect('/videos/' . $video_key);
    }
}
