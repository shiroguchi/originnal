@if (Auth::user()->is_favoriting($content->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $content->id], 'method' => 'delete']) !!}
            <button class="border border-0"><i class="fas fa-heart"></i></button>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $content->id]]) !!}
            <button class="border border-0"><i class="far fa-heart"></i></button>
        {!! Form::close() !!}
@endif

