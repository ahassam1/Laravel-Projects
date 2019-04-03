<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\WrittenBy;
use DB;
use App\Quotation;

class BookViewController extends Controller
{
    public function index()
    {

        return view('bookview');
    }
    public function postform()
    {
        $data = Input::get('data1');

    //somecodes

    return Response::json(array(
                    'success' => true,
                    'data'   => $data
                )); 
    }
}
