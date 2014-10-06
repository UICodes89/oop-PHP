<?php
  //autoload function to load different classes.
  include"core/init.php";
  $user=DB::getInstance()->query("SELECT username FROM user WHERE username=?", array('alex'));
  if(!$user->error()){

  	echo"success";
  }else{
  	echo"not ok";
  }

?>