<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request as HttpRequest; 
use App\User;

class UsersController extends Controller
{
  public function index()
  {
    $users = User::paginate();
    return $users;
  }

  public function auth_user()
  {
    $user = \Auth::User();
    return $user;
  }
}
