<?php
	include "../dataBase/DBManager.php";
	use PHPUnit\Framework\TestCase;

	class DBManagerTest extends TestCase
	{
		public function testConnection()
		{
			$singleton = DBManager::getInstance();
			$this->assertEquals(true, $singleton->isConnectionSet());
		}
	}
?>