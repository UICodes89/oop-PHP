<?php
   function __autoload($classname){
    include $classname.'.php';
   }

?>