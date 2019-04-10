<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('users.browse');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $videos = $user->videos;
        $videoapi = array();
        $i = 0;

        foreach($videos as $video)
        {
            $videoapi[$i] = Youtube::getVideoInfo($video->video_key);
            $i++;
        }

        /**
        $videos = $user->videos();
        $videoapis = array();

        foreach($videos as $video) {
            $videoapi = Youtube::getVideoInfo($video->video_key);
            array_push($videoapis, $videoapi);
        }

        dd($videoapis);
        **/

        return view('users.show', compact('user', 'videoapi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->playlist_title = $request->input('playlist_title');

        if($request->input('picture_url') == null)
        {

        }
        else
        {
            $user->picture_url = $request->input('picture_url');
        }

        $user->save();

        return redirect('/users/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
