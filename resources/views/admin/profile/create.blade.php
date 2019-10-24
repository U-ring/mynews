@extends('layouts.profile')

@section('title','プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール新規作成</h2>
                <form action="{{ action('Admin\ProfileController@create')
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
                   <label class><input type="checkbox" name="check">男性</label>
                   <label class><input type="checkbox" name="check">女性</label>
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
                     <textarea class="form-control" name="intr" cols="60"rows="15">
                       {{ old('body') }}</textarea>
                     </div>   
                 </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" 
                    value="作成">
                </form>
            </div>
        </div>
    </div>
@endsection