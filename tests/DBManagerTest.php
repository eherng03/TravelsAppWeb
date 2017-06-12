<?php
 	use travels\dataBase as database;
	use PHPUnit\Framework\TestCase;
	include "../dataBase/DBManager.php";

	class DBManagerTest extends TestCase
	{
		public function testConnection()
		{
			$singleton;
			try{
				$singleton = database\DBManager::getInstance();
			}catch(Exception $e){
				print_r("Inicia la base de datos");
			}
			
			$this->assertEquals(true, $singleton->isConnectionSet());
		}
	}
?>