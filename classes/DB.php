<?php
  class DB{

  	 private static $_instance=null;
  	 private $_pdo,
  	         $_query,
  	         $_error=false,
  	         $_result,
  	         $count=0;
  	   private function __construct(){
       //  echo 'mysql:host='.config::get('mysql/host').';dbname='.config::get('mysql/db').','. config::get('mysql/username').','. config::get('mysql/password');    
  	   	try{
  	   		$this->_pdo=new PDO('mysql:host='. config::get('mysql/host') .';dbname='.config::get('mysql/db'), config::get('mysql/username'),config::get('mysql/password'));

  	   	 }catch(PDOException $e){

  	   	 	die($e->getMessage());
  	   	 }
  	   }
  	public static function getInstance(){

  		if(!isset(self::$_instance)){
  			self::$_instance=new DB();
  		}
  		return self::$_instance;
  	}   
  }
?>