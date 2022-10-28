<nav class="navbar has-background-light">
    <div class="container">
        <div class="navbar-start">
            <div class="navbar-item">
                @if ($isAdmin)
                    <a class="button is-primary has-text-weight-bold" href="{{route('addpunch')}}">Создать</a>
                @endif
            </div>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
            
                @if ($userName) 
                    <div class="has-text-weight-bold">{{$userName}}</div>
                    <form method="POST" action={{ route('logout')}}>
                        @csrf
                        <div class="field has-addons">
                            <div class="has-text-weight-bold mr-4"></div>
                            <button class="button is-primary has-text-weight-bold" type="submit">Выйти</button>
                        </div>
                    </form>
                @else
                    <form method="POST" action={{ route('login')}}>
                        @csrf
                        <div class="field has-addons">
                            <p class="control">
                            <input class="input" type="text" placeholder="Логин" name="name">
                            </p>
                            <p class="control">
                            <input class="input" type="password" placeholder="Пароль" name="password">
                            </p>
                            <p class="control">
                            <button class="button is-primary has-text-weight-bold" type="submit" id="button-login">Войти</button>
                            </p>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>