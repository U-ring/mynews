<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\HTML;

use App\Profile;

/**/
class ProfileController extends Controller
{
  //
  public function index(Request $request)
      {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
           $posts = Profile::where('yourname', $cond_title)->get();
        } else {
           $posts = Profile::all();
        }
        return view('profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
      }
}