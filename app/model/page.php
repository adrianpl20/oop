<?php

class Model_Page {
  
  public function getContent()
  {
    return 'To jest content.';
  }
  
  public function getList()
  {
    $db = Database::instance()->query('SELECT user FROM `uzytkownicy`');
    $result = $db->fetchAll();
    $db->closeCursor();
    unset($db);
    return $result;
  }
}

?>