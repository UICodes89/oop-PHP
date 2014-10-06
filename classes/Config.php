<?php

  class config{

  	public static function get($path = null){

  		if($path){

  			$config=$GLOBALS['config'];
  			$path=explode('/', $path);
  			foreach($path as $bit){
          if($config[$bit]){
            $config=$config[$bit];
          }
  				
  			}
  		}
  		return $config;
  	}
  }
?>