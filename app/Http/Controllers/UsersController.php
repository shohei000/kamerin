<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request as HttpRequest; 
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePhoto;

class UsersController extends Controller
{
  public function index()
  {
    $users = User::paginate();
    return $users;
  }

  public function auth_user()
  {
    $user = Auth::User();
    return $user;
  }

  public function profile_update(Request $request)
  {
    $user = Auth::User();
    $data = $request->all();
    $user->fill($data)->save();
    return $user;
  }

  /**
     * 写真投稿
     * @param StorePhoto $request
     * @return \Illuminate\Http\Response
     */
    public function photo_create(Request $request)
    {
      foreach ($request->photos as $key => $photo) {
        $extension = $photo->extension();
        $new_photo = new Photo();
        $new_photo->filename = uniqid() . '.' . $extension;
        $path = $photo->storeAs(Auth::user()->id, $new_photo->filename, ['disk' => 'public']);
        DB::beginTransaction();
        try {
          Auth::user()->photos()->save($new_photo);
          DB::commit();
        } catch (\Exception $exception) {
          DB::rollBack();
          throw $exception;
        }
      }
      return response(Auth::user(), 201);
    }

}
