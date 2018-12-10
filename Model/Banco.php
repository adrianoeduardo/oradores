<?php

class Banco {
	private static $instance;
	public static function getInstance(){
		if(!isset(self::$instance)){
			try {
				self::$instance = new PDO("mysql:host=localhost;dbname=bd_oradores; charset:utf8", "root", "");
				self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				self::$instance->exec("set names utf8");
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		return self::$instance;
	}
 	
	public static function prepare($sql){
		return self::getInstance()->prepare($sql);
	}
}
?>