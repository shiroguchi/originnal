@extends('layouts.app')

@section('content')

   <div class="col-sm-12">
    @include('users.card',['user' => $user])

        
        <!--ナビゲーションタブ-->
        @include('contents.navtab', ['user' => $user])
        
        <!--投稿があれば投稿を表示する-->
        @if (count($contents) > 0)
             @include('contents.contents', ['contents' => $contents])
        @endif
            
    </div>
@endsection