<style> 
    .nav-item:active{
     background-color: brown;
     }
</style>
<div class="col-sm-2" style ="margin-top:10px">
    <!--空白-->       
</div>
 <!--ナビゲーションタブ-->
<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">TimeLine</a></li>
    <li class="nav-item"><a href="{{ route('users.recommends', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/recommends') ? 'active' : '' }}">おすすめ一覧<i class="fas fa-star"></i></a></li>
    <li class="nav-item"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">お気に入り一覧<i class="fas fa-heart"></i></a></li>
</ul>

<!--<a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">-->