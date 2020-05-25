@if (Auth::id() == $content->user_id)
@if (Auth::user()->is_recommending($content->id))
        {!! Form::open(['route' => ['recommends.unrecommend', $content->id], 'method' => 'delete']) !!}
            {!!Form::submit('おすすめから外す',['class' => 'btn btn-secondary rounded-pill']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['recommends.recommend', $content->id]]) !!}
            {!!Form::submit('おすすめに追加',['class' => 'btn btn-success rounded-pill']) !!}
        {!! Form::close() !!}
@endif
@endif