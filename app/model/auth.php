<?php

class Model_Auth {
    
  public function getPasswordFromId($userid)
  {
      $db = DB::instance()->prepare('SELECT password FROM `users` WHERE `id`=:id LIMIT 1;');
      $db->bindValue(':id', $userid, PDO::PARAM_INT);
      $db->execute();
      $result = $db->fetch(PDO::FETCH_ASSOC);
      $db->closeCursor();
      unset($db);
      return $result['password'];
  }
  
  public function getPasswordFromName($username)
  {
      $db = DB::instance()->prepare('SELECT password FROM `users` WHERE `name`=:name LIMIT 1;');
      $db->bindValue(':name', $username, PDO::PARAM_STR);
      $db->execute();
      $result = $db->fetch(PDO::FETCH_ASSOC);
      $db->closeCursor();
      unset($db);
      return $result['password'];
  }
  
  public function userNameExists($username)
  {
      $db = DB::instance()->prepare('SELECT COUNT(1) as cnt FROM `users` WHERE `name`=:name LIMIT 1;');
      $db->bindValue(':name', $username, PDO::PARAM_STR);
      $db->execute();
      $result = $db->fetch(PDO::FETCH_ASSOC);
      $db->closeCursor();
      unset($db);
      return (int)$result['cnt'];
  }
  
  public function registerValidation(array $data)
  {
      if(empty($data))
          return FALSE;
      
      $errors = array();
      
      if(empty($data['name']))
          $errors[] = 'Musisz podać nazwę użytkownika.';
      else if(strlen($data['name']) < 4 OR strlen($data['name']) > 20)
          $errors[] = 'Nazwa użytkownika musi zawierać 4-20 znaków.';
      else if($this->userNameExists($data['name']))
          $errors[] = 'Taka nazwa użytkownika jest już zajęta.';
      
      if(empty($data['password']))
          $errors[] = 'Musisz podać hasło.';
      else if(strlen($data['password']) < 5 OR strlen($data['password']) > 20)
          $errors[] = 'Hasło musi zawierać 5-20 znaków.';
      
      if(empty($data['repassword']))
          $errors[] = 'Musisz powtórzyć hasło.';
      if($data['password'] !== $data['repassword'])
          $errors[] = 'Hasła nie są takie same.';
      
      if(!empty($errors))
          return $errors;
      
      return TRUE;
  }
  
  public function createAccount(array $data)
  {
      $db = DB::instance()->prepare('INSERT INTO `users` SET `name`=:name, `password`=:pass');
      $db->bindValue(':name', $data['name'], PDO::PARAM_STR);
      $db->bindValue(':pass', Auth::instance()->encodePassword($data['password']), PDO::PARAM_STR);
      $db->execute();
  }
  
  public function loginValidation(array $data)
  {
      if(empty($data))
          return FALSE;
      
      $errors = array();
      
      if(empty($data['name']))
          $errors[] = 'Musisz podać swoją nazwę użytkownika.';
      
      if(empty($data['password']))
          $errors[] = 'Musisz podać hasło.';
      
      if(!empty($errors))
          return $errors;
      
      if($this->getPasswordFromName($data['name']) !== Auth::instance()->encodePassword($data['password']))
          return array('Nieprawidłowe dane.');
      
      return TRUE;
  }
}

?>