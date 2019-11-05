@extends('layouts.admin')
@section('taitle', 'Myプロフィール')

@section('content')
{{--コメント--}}
   <div class="container">
     <div class="row">
       <h2>Myプロフィール</h2>
     <div class="row">
         <div class="list-news col-md-12 mx-auto">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="15%">氏名</th>
                        <th width="10%">性別</th>
                        <th width="50%">趣味</th>
                        <th width="50%">自己紹介</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $profile)
                      <tr>
                         <th>{{ $profile->id }}</th>
                         <td>{{ $profile->yourname }}</td>
                         <td>{{ $profile->check }}</td>
                         <td>{{ $profile->hobby }}</td>
                         <td>{{ $profile->intr }}</td>
                         <td>
                           <div>
                             <a href="{{ action('Admin\ProfileController@edit',
                                              ['id' => $profile->id]) }}">編集</a>
                           </div>
                         </td>
                      </tr>
                    @endforeach  
                </tbody>
            </table>
         </div>       
     </div>
   </div>
@endsection

