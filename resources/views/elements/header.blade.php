<nav class="navbar has-background-light">
    <div class="navbar-start">
        <div class="navbar-item">
            <button class="button is-primary has-text-weight-bold">Создать</button>
        </div>
    </div>
    <div class="navbar-end">
        <div class="navbar-item">
        <form method="POST" action="logout.php">
            <div class="field has-addons">
                <div class="has-text-weight-bold mr-4"></div>
                <button class="button is-primary has-text-weight-bold" type="submit">Выйти</button>
            </div>
        </form>
        <form method="POST" action="login.php">
            <div class="field has-addons">
                <p class="control">
                <input class="input" type="text" placeholder="Логин" name="login">
                </p>
                <p class="control">
                <input class="input" type="password" placeholder="Пароль" name="pass">
                </p>
                <p class="control">
                <button class="button is-primary has-text-weight-bold" type="submit" id="button-login">Войти</button>
                </p>
            </div>
        </form>
        </div>
    </div>
</nav>