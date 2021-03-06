<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/">推守り</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                <li class="nav-item"><a href="/users/{{$user->id_name}}" class="nav-link">投票所</a></li>
                <li class="nav-item"><a href="/messagebox" class="nav-link">受信箱</a></li>
                <li class="nav-item"><a href="/followlist" class="nav-link">フォローリスト</a></li>
                <li class="nav-item"><a href="/logout" class="nav-link">ログアウト</a></li>
                @else
                <li class="nav-item"><a href="/login/twitter" class="nav-link">登録/ログイン</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>