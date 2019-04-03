<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    // secure api endpoint: exempt index() and show() methods from middleware
    // this way users can use index() and show() methods without being authenticated
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index']);
    }
}
