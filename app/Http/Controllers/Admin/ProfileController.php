<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

 use App\Profile;
 
 use App\ProfileHistory;
 
 use Carbon\Carbon;
 

class ProfileController extends Controller
{
    //
    public function add()
    {
       return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
      $this->validate($request, Profile::$rules); 
        
      $profile = new Profile();
      $profile_form = $request->all();
      unset($profile_form['_token']);
      
      $profile->fill($profile_form); 
      $profile->save();
      return redirect('admin/profile/create');
    }
    
    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
         $posts = Profile::where('yourname', $cond_title)->get();
      } else {
         $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    { 
      $this->validate($request, Profile::$rules);
      // News Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();//ユーザーが入力した
      unset($profile_form['_token']);
      
      $profile->fill($profile_form)->save();
      
      $history = new ProfileHistory;
      $history->profile_id = $profile->id;
      $history->edited_at = Carbon::now();
      $history->save();
      
    return redirect('/profile/');
    }
      public function delete(Request $request)
  {
    $profile = Profile::find($request->id);
    $profile->delete();
    return redirect('/profile/');
  }
}

