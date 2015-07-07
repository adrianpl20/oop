<!DOCTYPE html>
<html>
<head>
  <title><?php if(isset($this->title)) echo $this->title; ?></title>
</head>
<body>
  Szablon<br />
  <?php if(isset($this->content)) echo $this->content; ?>
</body>
</html>