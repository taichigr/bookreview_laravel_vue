
<!-- ナビゲーションバー -->
<nav class="navbar navbar-expand-lg navbar-light tempting-azure-gradient fixed-top">
    <a class="navbar-brand text-white" href="{{ route('home') }}">本紹介</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end text-white" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="/">Home</a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('register') }}">ユーザー登録</a>
            </li>
            @endguest
            @guest
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('login') }}">ログイン</a>
            </li>
            @endguest
            @auth
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('books.create') }}">投稿</a>
            </li>
            @endauth
            @auth
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('searchshow') }}">検索</a>
                </li>
            @endauth
            @auth
            <li class="nav-item">
                <button form="logout-button" class="nav-link text-white bg-transparent border-0" type="submit">
                    ログアウト
                </button>
            </li>
            <form id="logout-button" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
            @endauth

            <!-- ドロップダウンタイプ -->

        </ul>
    </div>
</nav>



