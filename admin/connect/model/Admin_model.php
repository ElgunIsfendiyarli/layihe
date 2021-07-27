<?php
	
	// include '../db/db.php';

class Admin_model extends Database
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getAdmins()
	{
		return $this->db->query("SELECT * from t_admin");
	}

	public function isAdmin($email)
	{
		return $this->db->query("SELECT * from t_admin where email='{$email}' and status='1' limit 1")->fetch();
	}
}


?>