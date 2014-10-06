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
  	public function query($sql, $params=array()){
  		$this->_error=false;
  		if($this->_query=$this->_pdo->prepare($sql)){
  			//count $params varable and bind it.
  			$x=1;
  			if(count($params)){
              foreach($params as $param){
              	$this->_query->bindvalue($x, $param);
              }
  			}
  			if($this->_query->execute()){

  				$this->_result=$this->_query->fetchAll(PDO::FETCH_OBJ);
  				$this->_count=$this->_query->rowCount();
  			}else{

  				$this->_error=true;
  			}
  		}
	return $this;

  	} 
  	public function action($action, $table, $where=array()){
     if(count($where)===3){
     	$operators=array('=','>','>=', '<=', '<');
     	$fields=$where[1];
        $operator=$where[1];
     	$value=$where[1];
     	if(in_array($operator, $operators)){
     		$query="{$action}FROM{$table}WHERE{$field}{$operator}?";
     		if(!$this->_query($sql,array($value))->error()){
     			return $this;
     		}
     	}
     	
     		
     }
     return false;

  	}
  	public function get($table, $where){
  		return $this->action('SELECT *', $table, $where);
  	}
  	public function error(){
  		return $this->_error;
  	}

  }
?>