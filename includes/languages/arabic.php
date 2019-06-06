<?php
     function lang($phrase){
              static $lang = array(
                     'MESSAGE' => 'ahlan',
                     'ADMIN' => 'adminstrator'
              );
         return $lang[$phrase];
      }