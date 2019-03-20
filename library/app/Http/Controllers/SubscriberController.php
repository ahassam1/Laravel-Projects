<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
        public function index()
    {
    	$role = Auth::user()->role; 

    	if ($role == 'subscriber' || 'admin')
    	{
    		return view('subscriber');
    	}
    	else
    	{
    		abort(404);
    	}
    }
}
