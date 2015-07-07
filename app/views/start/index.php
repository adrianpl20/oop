<a href="<?php echo Route::generateURI('default', array('controller' => 'start', 'action' => 'lamus')); ?>">Strona glowna</a>
<a href="<?php echo Route::generateURI('costam', array('controller' => 'kontakt')); ?>">Kontakt</a>

<h4>Uzytkownicy</h4>
  <?php
    foreach($this->users as $value)
    {
      echo $value['user'].'<br />';
    }
  ?>