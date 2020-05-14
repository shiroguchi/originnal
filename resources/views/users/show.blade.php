@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
        <!--投稿入力欄-->
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'contents.store']) !!}
                    <div class="form-group">
                        {!! Form::label('booktitle', '題名') !!}
                        {!! Form::text('booktitle', old('booktitle'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::textarea('memo', old('booktitle'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
    </div>
        <div class="col-sm-12">
            
            <!--ナビゲーションタブ-->
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('contents.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">TimeLine</a></li>
                <li class="nav-item"><a href="#" class="nav-link">おすすめ一覧</a></li>
                <li class="nav-item"><a href="#" class="nav-link">お気に入り</a></li>
            </ul>
            
            <!--投稿があれば投稿を表示する-->
            @if (count($contents) > 0)
                @include('contents.contents', ['contents' => $contents])
            @endif
            
        </div>
@endsection