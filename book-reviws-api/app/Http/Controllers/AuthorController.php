<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // secure api endpoint: exempt index() and show() methods from middleware
    // this way users can use index() and show() methods without being authenticated
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index() {
    	return AuthorResource::collection(Author::all());
    }

    public function show(Author $author)
    {
        return new AuthorResource($author);
    }
}
