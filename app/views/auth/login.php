<h3>Zaloguj się</h3>

<div>
    <?php if (!is_bool($this->valid) AND is_array($this->valid)): ?>
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
            <input type="submit" value="Zaloguj się" name="send" />
        </p>
    </form>
</div>