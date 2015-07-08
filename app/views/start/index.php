<h3>Artykuły</h3>

<?php if(!empty($this->news)): ?>
    <?php foreach($this->news as $value): ?>
        <div>
            <h2><a href="<?php echo Route::generateURI('news', array('controller' => 'news', 'action' => 'view', 'id' => $value['id'])); ?>"><?php echo $value['title']; ?></a></h2>
            <p><?php echo $value['text']; ?></p>
            <h5 style="border-bottom: 1px solid #aaa"><?php echo $value['date']; ?></h5>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Brak artykułów do wyświetlenia.</p>
<?php endif; ?>

