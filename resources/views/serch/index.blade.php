@extends('layouts.app')

@section('content')
<h1>投稿検索ページ(投稿一覧)</h1>
<div style="margin-bottom:10px">
    <div class="search">
	{{ Form::open(['method' => 'GET']) }}
	{{ Form::input('検索する', 'q', null) }}
	{{ Form::close() }}
	<p>キーワード検索：キーワードを入力↑</p>
	<p>カテゴリー検索：カテゴリー名(・自己啓発　 ・学問　 ・小説　 ・漫画 )を入力↑ <font color="red">※・を先頭につける</font>
    </div>
</div>
<!--投稿があれば投稿を表示する-->
    @if (count($contents) > 0)
        @include('contents.contents', ['contents' => $contents])
    @endif
	
	<div class="paginate">
	{{ $contents->appends(Request::only('q'))->links() }}
    </div>
    
@endsection