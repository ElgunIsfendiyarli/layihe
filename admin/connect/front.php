<?php 

include 'db/db.php';

include 'controller/PageInfo.php';

$page = new PageInfo;
$data_info = $page->infoGet();


class Front {

	private $db;
	function __construct()
	{
		global $db; 
		$this->db = $db;
	}



}


 ?>