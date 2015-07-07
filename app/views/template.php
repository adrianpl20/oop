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
</head>
<body>
  Szablon<br />
  <?php if(isset($this->content)) echo $this->content; ?>
</body>
</html>