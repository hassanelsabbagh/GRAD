<?php
     function lang($phrase){
              static $lang = array(
                     'HOME_ADMIN' => 'Admin Area',
                     'ADMIN' => 'adminstrator'
              );
         return $lang[$phrase];
      }