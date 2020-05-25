@extends('layouts.app')

@section('content') 
    <div class="col-sm-12">
        @include('users.card',['user' => $user])
    
        <!--ナビゲーションタブ-->
        @include('contents.navtab', ['user' => $user])
        @if (count($favorites) > 0)
            @include('contents.contents', ['contents' => $favorites])
        @endif
    </div>
@endsection