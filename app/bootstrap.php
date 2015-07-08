<?php

  $modules = array(
    'database',
    'auth'
  );
  
  // Routing
  Route::add('news', '<controller>/<action>/<id>',
          array(
              'controller' => 'news',
              'action' => 'view'
          ));
  Route::add('rozmowa', 'telefon(/<action>)',
          array(
              'controller' => 'contact',
              'action' => 'index'
          ));
  Route::add('costam', '<controller>',
          array(
              'action' => 'index'
          ));
  Route::add('default', '(<controller>(/<action>))',
          array(
              'controller' => 'start',
              'action' => 'index'
          ));

?>