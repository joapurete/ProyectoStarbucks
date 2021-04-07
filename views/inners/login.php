<div class="container">
    <form action="<?= URL; ?>ajax/login/login.php" method="post" id="formLogin" name="formLogin" pag-redirect="<?= URL ?>Index/start">
        <div class="mb-3">
            <label for="mail" class="form-label">Mail</label>
            <input required type="email" class="form-control" placeholder="Mail" id="mail" name="mail">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input required type="password" class="form-control" placeholder="Password" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="check" name="check">
            <label class="form-check-label" for="check">Recordarme</label>
        </div>
        <input type="hidden" name="action" id="action" value="login">
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>