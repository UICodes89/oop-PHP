<?php
  session_start();
  $GLOBALS['config']=array(
     'mysql'=>array(
          'host'=>'127.0.0.1',
          'username'=>'manoj',
          'password'=>'darbhanga',
          'db'=>'lr'
          ),

     'cookies'=>array(
     	'cookie_name'=>'hash',
     	'cookie_expiry'=>6200000
      ),

     'session'=>array(
     	'session_name'=>'user'
     	)

  	);
  function __autoload($class){
      include'classes/'.$class.'.php';
  }
?>