<!DOCTYPE html>
<html>
<head>
  <title><?php if(isset($this->title)) echo $this->title; ?></title>
  
  <?php
    if(isset($this->_style) AND !empty($this->_style))
    {
        foreach($this->_style as $value)
        {
            echo HTML::style($value);
        }
    }
    
    if(isset($this->_script) AND !empty($this->_script))
    {
        foreach($this->_script as $value)
        {
            echo HTML::script($value);
        }
    }
  ?>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <h1>News.pl</h1>
    <div>
        <a href="<?php echo Route::generateURI('default', array('controller' => 'start', 'action' => 'index')); ?>">Strona główna</a>
        <a href="<?php echo Route::generateURI('default', array('controller' => 'news', 'action' => 'add')); ?>">Dodaj artykuł</a>
        <a href="<?php echo Route::generateURI('costam', array('controller' => 'contact')); ?>">Kontakt</a>
        <a href="<?php echo Route::generateURI('default', array('controller' => 'auth', 'action' => 'register')); ?>">Zarejestruj się</a>
        <a href="<?php echo Route::generateURI('default', array('controller' => 'auth', 'action' => 'login')); ?>">Zaloguj się</a>
    </div>
    <?php if($this->logged === TRUE): ?>
        <div>
            Jesteś zalogowany. <a href="<?php echo Route::generateURI('default', array('controller' => 'auth', 'action' => 'logout')); ?>">Wyloguj się</a>
        </div>
    <?php endif; ?>

  <?php if(isset($this->content)) echo $this->content; ?>
</body>
</html>