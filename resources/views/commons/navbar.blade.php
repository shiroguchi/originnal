<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-success"> 
        <a class="navbar-brand" href="/">BookShelf</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())<!--ログインしているかどうか-->
                    <!--User一覧-->
                    <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>
                    <!--Create-->
                    
                    <li class="nav-item">{!! link_to_route('contents.create', '新規投稿', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('serch.getSearch', '検索', [], ['class' => 'nav-link']) !!}</li>
                    <!--ドロップダウン-->
                    <li class="nav-item dropdowm">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdowm-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else
                <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
               @endif
            </ul>
        </div>
    </nav>
</header>