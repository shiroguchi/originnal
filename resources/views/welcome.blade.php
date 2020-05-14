@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name}}
        <div class="col-sm-8">
                @if (count($contents) > 0)
                    @include('contents.contents', ['contents' => $contents])
                @endif
        </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>BookShelf</h1>
            <h2>Please sing up or Login</h2>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
@endsection