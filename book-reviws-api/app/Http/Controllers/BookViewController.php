<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookViewController extends Controller
{
    public function index()
    {
        return view('bookview');
    }

    public function postform(Request $request)
    {
        $data = $request->books;
        return Response::json(array(
                    'success' => true,
                    'data'   => $data
                )); 
    }
}