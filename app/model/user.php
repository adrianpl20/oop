<?php

class Model_User {
    
  public function getIdFromName($username)
  {
      $db = DB::instance()->prepare('SELECT id FROM `users` WHERE `name`=:name LIMIT 1;');
      $db->bindValue(':name', $username, PDO::PARAM_STR);
      $db->execute();
      $result = $db->fetch(PDO::FETCH_ASSOC);
      $db->closeCursor();
      unset($db);
      return (int)$result['id'];
  }
}

?>