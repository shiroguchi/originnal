@extends('layouts.app')

@section('content') 
    <div class="col-sm-12">
        @include('users.card',['user' => $user])
    
        <!--ナビゲーションタブ-->
        @include('contents.navtab', ['user' => $user])
        @if (count($recommends) > 0)
            @include('contents.contents', ['contents' => $recommends])
        @endif
    </div>
@endsection