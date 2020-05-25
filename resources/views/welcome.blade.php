@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name}}
        <div class="col-sm-8">
             @include('users.index', ['user' => $user])
        </div>
    @else
    <div class="center jumbotron row" >
        
        <div class="text-center rounded-circle bg-white " style="width: 300px;height: 300px;">
            <p>ようこそ</p>
            <h1 class="font-italic mt-4 text-success">BookShelf</h1>
            <h4>Please sing up or Login</h4>
            <div>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-outline-dark']) !!}
            </div>
            <div class="mt-3">
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
            </div>
        </div>
    </div>
    @endif
@endsection