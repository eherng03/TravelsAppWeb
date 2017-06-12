<?php
	require "../dataBase/DBManager.php";
	use PHPUnit\Framework\TestCase;

	class DBManagerTest extends TestCase
	{
		public function testConnection()
		{
			$singleton;
			try{
				$singleton = DBManager::getInstance();
			}catch(Exception $e){
				print_r("Inicia la base de datos");
			}
			
			$this->assertEquals(true, $singleton->isConnectionSet());
		}
	}
?>