<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    function UsersIndex(){

    //$UsersData = json_decode(UsersTableModel::orderBy('id','desc')->take(500)->get());

      $UsersData = json_decode(User::all());
      
        return view('Users',['UsersData'=>$UsersData]);
    }
}
