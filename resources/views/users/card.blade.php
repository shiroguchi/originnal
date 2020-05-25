<div class="row d-flex flex-row">
        <aside class="col-sm-3">
        
            <!--カード(名前＋アイコン)-->
            <div class="card mt-1">
                <div class="card-header">
                    <h3 class="card-title">{{$user->name }}</h3>
                </div>
                <div class="card-body text-center">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 200) }}" alt="">
                </div>
            </div>
        
        </aside>
        
        <div class="col-sm-2">
             <!--空白-->       
        </div>
            
    <!--新規投稿ボタン-->
        <div class="align-self-center">
            @if (Auth::id() == $user->id)
            {!! link_to_route('contents.create', '新規メッセージの投稿', [], ['class' => 'btn btn-primary rounded-pill']) !!}
            @endif
            
            <p><i class="far fa-star"></i>…おすすめ登録</p>
            <p><i class="far fa-heart"></i>…お気に入り登録</p>
        </div>
        
</div>