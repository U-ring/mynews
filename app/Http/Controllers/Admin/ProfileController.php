<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Profile;
 

class ProfileController extends Controller
{
    //
    public function add()
    {
       return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
      
      $validatedDaTa = $request->validate([
        'yourname' => 'required',
        'check' => 'required',
        'hobby' => 'required',
        'intr' => 'required',
        ]);
        
      $profile = new Profile();
      $profile->yourname = $validatedDaTa['yourname'];
      $profile->check = $validatedDaTa['check'];
      $profile->hobby = $validatedDaTa['hobby'];
      $profile->intr = $validatedDaTa['intr'];
      $profile->save();
      return redirect('admin/profile/create');
    }
    
    public function edit()
    {
      return view('admin.profile.edit');
    }
    
    public function update()
    {
    return redirect('admin/profile/edit');  
    }
}

