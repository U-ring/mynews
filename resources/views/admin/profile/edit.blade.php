@extends('layouts.profile')

@section('title','プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update')
                }}" method="post" enctype="multipart/form-data">
                  
                  @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                 <div class="form-group row">
                    <label class="col-md-2">氏名</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" 
                           name="yourname" value="{{ old('yourname')}}" >
                    </div>
                 </div>
                 <div class="form-group row">
                   <label class><input type="checkbox" name="check" value = "男性">男性</label>
                   <label class><input type="checkbox" name="check" value = "女性">女性</label>
                 </div>
                 <div class="form-group row">
                   <label class="col-md-2">趣味</label>
                   <div class="col-md-10">
                     <textarea class="form-control" 
                     name="hobby" cols="50" rows="5"></textarea>
                   </div>
                 </div>
                 <div class="form-group row">
                     <label class="col-md-2">自己紹介</label>
                     <div class="col-md-10">
                     <textarea class="form-control" name="intr" cols="60" rows="15">
                       {{ old('body') }}</textarea>
                     </div>   
                 </div>
                 <div class="form-group row">
                        <div class="col-md-10">　　　　　　　　　　　
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                 </div>    
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->histories != NULL)
                                @foreach ($profile_form->histories as $history)
                                   <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection