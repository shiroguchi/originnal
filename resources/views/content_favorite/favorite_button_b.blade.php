@if (Auth::user()->is_favoriting($content->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $content->id], 'method' => 'delete']) !!}
            {!!Form::submit('お気に入りから外す',['class' => 'btn btn-secondary rounded-pill']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $content->id]]) !!}
            {!!Form::submit('お気に入りに追加',['class' => 'btn btn-warning rounded-pill']) !!}
        {!! Form::close() !!}
@endif