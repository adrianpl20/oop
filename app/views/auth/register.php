<h3>Zarejestruj się</h3>

<div>
    <?php if($this->valid === TRUE): ?>
        <h4 style="color: green">Pomyślnie utworzono konto. Możesz się już zalogować.</h4>
    <?php elseif ($this->valid !== FALSE AND is_array($this->valid)): ?>
        <?php foreach($this->valid as $value): ?>
            <p style="color: brown"><?php echo $value; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <form action="" method="POST">
        <p>
            Nazwa użytkownika: <input type="text" name="name" />
        </p>
        <p>
            Hasło: <input type="password" name="password" />
        </p>
        <p>
            Powtórz hasło: <input type="password" name="repassword" />
        </p>
        <p>
            <input type="submit" value="Zarejestruj się" name="send" />
        </p>
    </form>
</div>