@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name}}
        <div class="col-sm-8">
             @include('users.index', ['user' => $user])
        </div>
    @else
    <div class="center jumbotron row" >
        
        <div class="text-center rounded-circle bg-white " style="width: 300px;height: 300px;">
            <p>ようこそ</p>
            <h1 class="font-italic mt-4 text-success">BookShelf</h1>
            <h4>Please sing up or Login</h4>
            <div>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-outline-dark']) !!}
            </div>
            <div class="mt-3">
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
            </div>
        </div>
        
<ul class="details">
	<li>
		<!--<img src="image/book4.jpg">-->
		<div style="width:200px height:200px">
		    <font color="white" size="20px">BookShelfとは・・・？</font>
		</div>
		<dl>
			<dt>BookShelf</dt>
			<dd>本の情報共有ツールです。自分が読んだ本の要約・感想・意見などを他のユーザーと共有できます。
			他ユーザーの投稿を閲覧することで、読みたい本が見つかるかもしれないですね。
			また、投稿することで今まで自分が読んだ本の情報を保存しておくノートとしても使用できます。BookShelfを利用して素敵な読書ライフを送ってみませんか？</dd>
			
		</dl>
	</li>
	<!-- 略 -->
</ul>
    </div>
    @endif
@endsection