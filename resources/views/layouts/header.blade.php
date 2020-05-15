@section('header')
    <nav class="navbar navbar-dark mb-3">
        <a class="navbar-brand" href="/"><img src="{{asset('/img/icon.svg')}}" width="30" height="30" alt=""><img
                src="{{asset('/img/logo.png')}}" width="113" height="30" alt=""></a>
        <div class="justify-content-end">
            @auth
                <div class="dropdown">
                    <a class="" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{Auth::user()->avatar }}" alt="" width="32" height="32" id="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <span class="dropdown-item-text text-muted">{{Auth::user()->name}}さん</span>
                        <a class="dropdown-item" href="auth/twitter/logout">ログアウト</a>
                    </div>
                </div>
            @else
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="auth/twitter">
                            Twitterで新規登録/ログイン
                        </a>
                    </li>
                </ul>
            @endauth
        </div>
    </nav>
@endsection
