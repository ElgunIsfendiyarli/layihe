<?php

	session_start();


		class Database 
		{
			private $host               ='localhost';
			private $db_name            ='klinika';
			private $usarname           ='root';
			private $password           ='12345678';
			public $db;
			
			function __construct()
			{
				$db = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->usarname,$this->password);
				$this->db=$db;
			}
		}

?>