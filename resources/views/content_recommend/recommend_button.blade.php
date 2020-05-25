@if (Auth::id() == $content->user_id)
@if (Auth::user()->is_recommending($content->id))
        {!! Form::open(['route' => ['recommends.unrecommend', $content->id], 'method' => 'delete']) !!}
            <button class="border border-0"><i class="fas fa-star"></i></button>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['recommends.recommend', $content->id]]) !!}
            <button class="border border-0"><i class="far fa-star"></i></button>
        {!! Form::close() !!}
@endif
@endif