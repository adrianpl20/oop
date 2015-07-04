<!DOCTYPE html>
<html>
<head>
  <title><?php if(isset($this->title)) echo $this->title; ?></title>
</head>
<body>
  Szablon<br />
  <?php if(isset($this->content)) echo $this->content; ?>
  <br /><br />
  <h4>Uzytkownicy</h4>
  <?php
    foreach($this->users as $value)
    {
      echo $value['user'].'<br />';
    }
  ?>
</body>
</html>