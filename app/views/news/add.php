<h3>Dodaj artykuł</h3>

<div>
    <?php if($this->valid === TRUE): ?>
        <h4 style="color: green">Dodano artykuł!</h4>
    <?php elseif ($this->valid !== FALSE AND is_array($this->valid)): ?>
        <?php foreach($this->valid as $value): ?>
            <p style="color: brown"><?php echo $value; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <form action="" method="POST">
        <p>Tytuł:</p>
        <p>
            <input type="text" name="title" />
        </p>
        <p>Treść:</p>
        <p>
            <textarea placeholder="Treść artykułu..." rows="5" cols="50" name="text"></textarea>
        </p>
        <p>
            <input type="submit" value="Dodaj" name="add" />
        </p>
    </form>
</div>