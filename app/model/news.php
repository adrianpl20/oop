<?php

class Model_News {
  
  public function validation(array $data)
  {
      if(empty($data))
          return FALSE;
      
      $errors = array();
      
      if(empty($data['title']))
          $errors[] = 'Musisz podać tytuł artykułu.';
      else if(strlen($data['title']) > 100)
          $errors[] = 'Tytuł artykułu może zawierać maksymalnie 100 znaków.';
      
      if(empty($data['text']))
          $errors[] = 'Musisz podać treść artykułu.';
      else if(strlen($data['text']) > 500)
          $errors[] = 'Treść artykułu może zawierać maksymalnie 500 znaków.';
      
      if(!empty($errors))
          return $errors;
      
      return TRUE;
  }
  
  public function add(array $data)
  {
      $db = DB::instance()->prepare('INSERT INTO `news` SET `title`=:title, `text`=:text, `date`=NOW()');
      $db->bindValue(':title', $data['title'], PDO::PARAM_STR);
      $db->bindValue(':text', $data['text'], PDO::PARAM_STR);
      $db->execute();
  }
  
  public function getAll()
  {
      $db = DB::instance()->query('SELECT id, title, text, date FROM `news` ORDER BY `date` DESC');
      $result = $db->fetchAll();
      $db->closeCursor();
      unset($db);
      return $result;
  }
}

?>