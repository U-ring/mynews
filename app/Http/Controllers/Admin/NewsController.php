<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\News; //←この追記でNews Modelが扱えるようになる

class NewsController extends Controller
{
    //以下を追記
    public function add()
    {
        return view('admin.news.create');
    }
    
    //以下を追記
    public function create(Request $request)
    {
      
    //Varidationを行う
       $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image',
        ]);

        $news = new News();
        $news->title = $validatedData['title'];
        $news->body = $validatedData['body'];
        
        if (isset($validatedData['image'])) {
            $path = $validatedData['image']->store('images');
            $news->images_path = basename($path);
        }
        $news->save();
        return redirect('admin/news/create');
    }
    
}
