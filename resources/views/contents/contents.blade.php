<ul class="list-unstyled">
    @foreach ($contents as $content)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($content->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('contents.show', $content->user->name, ['id' => $content->user->id]) !!} <span class="text-muted">posted at {{ $content->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0 font-weight-bold">{!! nl2br(e($content->booktitle)) !!}</p>
                    
                    <p class="mb-0 border">{!! nl2br(e($content->memo)) !!}</p>
                </div>
                <div>
                    <!--投稿削除ボタン　投稿ユーザーのみ表示-->
                    @if (Auth::id() == $content->user_id)
                        {!! Form::open(['route' => ['contents.destroy', $content->id], 'method' =>'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $contents->links('pagination::bootstrap-4') }}