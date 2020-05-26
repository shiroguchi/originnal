<ul class="list-unstyled">
    @foreach ($contents as $content)
        <li class="media mb-3 border" style="width:85%">
            
            <img class="mr-2 rounded" src="{{ Gravatar::src($content->user->email, 50) }}" alt="">
            <div class="media-body">
                <div class = "d-flex">
                    <div class="mr-auto p-1" style="font-size:12px">
                        {!! link_to_route('users.favorites', $content->user->name, ['id' => $content->user->id]) !!}
                        <p class="mb-0 font-weight-bold mr-2">{!! nl2br(e($content->category)) !!}</p>
                    </div>
                    
                    <div class="p-1"style="font-size:12px"> 
                    {!! link_to_route('contents.show','詳細画面', $content->id, ['id' => $content->id]) !!}
                    </div>
                    
                     <!--おすすめ登録ボタン-->
                    <div class="p-1">
                        @include('content_recommend.recommend_button',['content' => $content])
                    </div>
                    
                    <!--お気に入り登録ボタン-->
                    <div class="p-1">
                        @include('content_favorite.favorite_button',['content' => $content])
                    </div>
        
                    <!--ユーザー名-->
                    <div class="p-1">
                        <span class="text-muted">posted at {{ $content->created_at }}</span>
                    </div>
                    <div class="p-1">
                       <!--投稿削除ボタン投稿ユーザーのみ表示-->
                        @if (Auth::id() == $content->user_id)
                            {!! Form::open(['route' => ['contents.destroy', $content->id], 'method' =>'delete']) !!}
                                {!! Form::submit('×', ['class' => 'btn btn-danger btn-sm btn-dell']) !!}
                            {!! Form::close() !!}
                        @endif
                        @if (Auth::id() != $content->user_id)
                            <div class="mr-4"></div>
                        @endif
                    </div>
                </div>
                <div class="row ml-2">
                    <p class="mb-0 font-weight-bold mr-2">{!! nl2br(e($content->booktitle)) !!}</p>
                </div>
                <div class="row border" style="width:100%">
                    
                    <p class="mb-0 col-4 text-break text-truncate" style="max-width:500px">{!! nl2br(e($content->memo)) !!}</p>
                </div>
                
            </div>
        </li>
    @endforeach
</ul>
{{ $contents->links('pagination::bootstrap-4') }}