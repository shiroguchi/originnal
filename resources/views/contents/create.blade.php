@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
        
            <!--カード(名前＋アイコン)-->
            <aside>
                    <h4><class="card-title">{{$user->name }}</h4>
               
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 50) }}" alt="">
               
            
           </aside>
    <div class="col-sm-8">
        <h5>新規投稿画面</h5>
        <div class="text-center mt-3">
            <!--カテゴリー設定、おすすめに追加ボタン-->
            @include('content_favorite.favorite_button_b',['content' => $content])
           
            </div>
    <!--投稿入力欄-->
        @if (Auth::id() == $user->id)
            {!! Form::model($content,['route' => 'contents.store']) !!}
                <div class="form-group mt-5">
                    <div>
                    {!! Form::label('category', 'カテゴリー') !!}
                    {!! Form::select('category', ['・学問'=>'学問', '・自己啓発'=>'自己啓発', '・小説'=>'小説','・漫画'=>'漫画','・'=>'カテなし',],['class' => 'form', 'id'=>'category'], ['placeholder' => '選択してください']) !!}
                    </div>
                    {!! Form::label('booktitle', '題名') !!}
                    {!! Form::text('booktitle', old('booktitle'), ['class' => 'form-control', 'rows' => '2']) !!}
                    {!! Form::label('memo', 'メモ') !!}
                    {!! Form::textarea('memo', old('booktitle'), ['class' => 'form-control', 'rows' => '15']) !!}
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
            {!! Form::close() !!}
        @endif
    </div>
    
</div>
@endsection
