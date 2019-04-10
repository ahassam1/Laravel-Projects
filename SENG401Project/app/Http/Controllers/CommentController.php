<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store($video_key)
    {
        $attributes = request()->validate([
            Auth::user()->id,
            $video_key => ['required', 'min:2', 'max:255'],
            'content' => ['required', 'min:10'],
        ]);

        Comment::create($attributes);

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
