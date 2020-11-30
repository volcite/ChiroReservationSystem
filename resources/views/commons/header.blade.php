<!--ヘッダー記述-->
<header class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#0E8088">
        <a class="navbar-brand" href="/"><img src="/image/logoblack.png" alt="" width="50" height="50"></a>
        <div class="float-left">
            <div>
                <h5 class="text-white">手と手整骨院</h5>
            </div>
        </div>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

    @guest
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="users/create" class="nav-link">新規ユーザ登録</a></li>
                <li class="nav-item"><a href="" class="nav-link">ログイン</a></li>
            </ul>
        </div>
    @endguest

      
    @can('user') <!-- ユーザーでログイン状態 -->
            <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="" class="nav-link">予約確認</a></li>
                <li class="nav-item"><a href="" class="nav-link">名前</a></li>
                <li class="nav-item"><a href="" class="nav-link">ログアウト</a></li>
            </ul>
        </div>
        
    @endcan

    @can('admin') <!-- 管理者でログイン状態 -->
    <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="" class="nav-link">予約一覧</a></li>
                <li class="nav-item"><a href="" class="nav-link">お客様一覧</a></li>
                <li class="nav-item"><a href="" class="nav-link">管理者</a></li>
                <li class="nav-item">
                <a href="{{ route('admin.logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                </li>
            </ul>
    </div>
    @endcan

    </nav>
</header>