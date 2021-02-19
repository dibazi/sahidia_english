<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * 
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

        public function index($user)
    {
    	$user = User::findOrFail($user);
        return view('profiles.index', [
        	'user'=>$user,]);
    }

            public function find($id)
    {
        $id = User::findOrFail($id);
        return view('profiles.index', [
            'id'=>$id,]);
    }
}
