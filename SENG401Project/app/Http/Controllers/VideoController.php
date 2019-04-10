<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Support\Facades\Auth;
use DB;

class VideoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video_key = Youtube::parseVidFromURL($request->input('url'));

        Video::create([
            'user_id' => Auth::user()->id,
            'video_key' => $video_key,
        ]);

        return redirect('/users/'. Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($video_key)
    {
        $videoObject = Youtube::getVideoInfo($video_key);
        $comments = DB::table('comments')
            ->where('video_key', $video_key)
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->get()->paginate(15);

        $sql = 'SELECT AVG(ratings), video_key FROM Ratings WHERE video_key = ' . $video_key . 'GROUP BY video_key ORDER BY AVG(ratings) ASC';
        $rating = (DB::select($sql))[0];

        return view('videos.show', compact('videoObject', 'comments', 'rating'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video_key)
    {
        $video = DB::table('videos')
            ->where('video_key', $video_key)
            ->first();

        $video->delete();
    }
}
