<?php

  $start_controller = 'start';
  $modules = array(
    'database',
  );
  
  // Routing
  Route::add('rozmowa', 'telefon(/<action>)',
          array(
              'controller' => 'kontakt',
              'action' => 'gunwo'
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