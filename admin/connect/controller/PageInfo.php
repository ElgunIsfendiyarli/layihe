<?php 


class PageInfo {

	private $db;
	function __construct()
	{
		global $db; 
		$this->db = $db;
	}


	public function infoGet()
	{
		$data = $this->db->query("SELECT * from t_page_info where id='1'")->fetch();
		return  $data; 
		

	}


	public function updateInfo($post){
		
		$update = $this->db->prepare("UPDATE t_page_info set
			adress=:adress,
			phone=:phone,
			email=:email,
			s_facebook=:s_facebook,
			s_instagram=:s_instagram,
			s_twitter=:s_twitter
								where id='1'
			");
		$ok = $update->execute([
			'adress'=>$post['adress'],
			'phone'=>$post['phone'],
			'email'=>$post['email'],
			's_facebook'=>$post['s_facebook'],
			's_instagram'=>$post['s_instagram'],
			's_twitter'=>$post['s_twitter']
		]);
		return $ok;

	}

}

 ?>