@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
<!--カード(名前＋アイコン)-->
            <aside>
                    <h4><class="card-title">{{$user->name }}</h4>
               
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 50) }}" alt="">
               
            
           </aside>
 
        <div class="col-sm-9">
             <h4>投稿詳細ページ</h4>
            <p style=>題名</p>
            <p class="mb-0 border font-weight-bold">{!! nl2br(e($content->booktitle)) !!}</p>
            <p>メモ</p> 
            <div class="border"style="">
            <p class="mb-0 text-wrap text-break wordwWrap-breakWord " style=" width:300px">{!! nl2br(e($content->memo)) !!}</p>
        </div>
        <div class="text-center mt-3">
            <!--カテゴリー設定、おすすめに追加ボタン-->
            @include('content_favorite.favorite_button_b',['content' => $content])
        </div>
        <div class="d-flex justify-content-around mt-3">
            
            @if (Auth::id() == $content->user_id)
            {!! link_to_route('contents.edit', '編集する', ['id' => $content->id], ['class' => 'btn btn-light rounded-pill btn-lg']) !!}
            @include('content_recommend.recommend_button_b',['content' => $content])
            {!! Form::open(['route' => ['contents.destroy', $content->id], 'method' =>'delete']) !!}
                {!! Form::submit('削除する', ['class' => 'btn btn-danger rounded-pill btn-lg']) !!}
            {!! Form::close() !!}
            @endif
            </div>
        </div>
        <div>
            {!! Form::open(['route' => ['comments.store',$content->id]]) !!}
             {{ Form::hidden('content_id',$content->id) }}
             
            {!! Form::label('comment','コメントを入力してください') !!}
            {!! Form::textarea('comment',old('comment')) !!}

            {!! Form::submit('コメントする') !!}

            {!! Form::close() !!}

        @forelse($content->comments as $comment)

            {!! $comment->user->name !!}
            {!! nl2br(e($comment->comment)) !!}<br>

        @empty

            <p>コメントはまだありません</p>

        @endforelse
        </div>
    </div>
@endsection
