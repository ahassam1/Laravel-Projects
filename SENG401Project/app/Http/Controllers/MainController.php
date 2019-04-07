<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;



class MainController extends Controller
{



    public function index()
    {
        $video = Youtube::getVideoInfo('wXo24imR_54');
        //dd($video);

        return view("main", compact('video'));
    }
}
