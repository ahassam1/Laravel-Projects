<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use DB;


class AdminController extends Controller
{
    public function index()
    {

        $users = DB::table('users')->get();

    	$role = Auth::user()->role; 

    	if ($role == 'admin')
    	{
    		return view('admin', compact('users'));
    	}
    	else
    	{
    		abort(404);
    	}
    }
    public function rolechanger($id, $role)
    {
        $message = "Role successfully changed"; 

        DB::table('users')
            ->where('id', $id)
            ->update(['role' => $role]);

        $users = DB::table('users')->get();

        return view('admin', compact('users'));
    }
}
