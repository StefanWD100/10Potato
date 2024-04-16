<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TableController extends Controller
{
    public function table()
    {
        

        $users      = User::all()->sortByDesc('points');
        return view('top',['users'=>$users]);

   
    }

}
