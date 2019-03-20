<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
    	$role = Auth::user()->role; 

    	if ($role == 'admin')
    	{
    		return view('admin');
    	}
    	else
    	{
    		abort(404);
    	}
    }
}
