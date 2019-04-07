<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;



class MainController extends Controller
{



    public function index()
    {
        $video = Youtube::getVideoInfo('rie-hPVJ7Sw');

        return view("main", ["video"=>json_encode($video, true)]);
    }
}
