<?php 


class Admin 
{
	private $admin_model;

	function __construct()
	{
		$this->admin_model = new Admin_model;
	}


	public function adminSelect(){
		$data = $this->admin_model->getAdmins();
		return $data;
	}


	public function login($post){
		$email 		= $post['email'];
		$password 	= $post['password'];

		if (filter_var($email,FILTER_VALIDATE_EMAIL) and !empty($password)) {
			 
			 
			 $data = $this->admin_model->isAdmin($email);

			 
			 if($data){
			 	 if($data['password'] == sha1($password)){
			 	 	$_SESSION['login'] = 'ok';
			 	 	$_SESSION['name'] = $data['name'] ;
			 	 	return true;
			 	 }
			 }
		}

		return false; 

	}

	

	// public function adminInsert($post){

	// 	$err 				= [];
	// 	$name 				= $post['name'];
	// 	$surname 			= $post['surname'];
	// 	$email 				= $post['email'];
	// 	$phone 				= $post['phone'];
	// 	$password 			= $post['password'];
	// 	$comfirm_password 	= $post['comfirm_password'];


	// 	if($password!=$comfirm_password){
	// 		array_push($err, 'Şifrələr bir birinə bərabər deyil');
	// 	}

	// 	if($name==""){
	// 		array_push($err,'Ad boş ola bilməz');
	// 	}

	// 	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	// 		array_push($err, 'Email düzgün formatda deyil');
	// 	}	


	// 	if(empty($err)){
			 
	// 		$insert = $this->db->prepare("INSERT into t_admin set
	// 			name=:name,
	// 			surname=:surname,
	// 			email=:email,
	// 			phone=:phone,
	// 			password=:password
	// 			");
	// 		$ok = $insert->execute(array(
	// 			'name'=>$name,
	// 			'surname'=>$surname,
	// 			'email'=>$email,
	// 			'phone'=>$phone,
	// 			'password'=>sha1($password)
	// 			));
	// 		return $ok;

	// 	}else{
	// 		return $err;
	// 	}

	// }

	

	// public function adminSelectCustom($id){
	// 	$data = $this->db->query("SELECT * from t_admin where id='{$id}'")->fetch();
	// 	return $data;
	// }

	// public function adminUpdate($post){
	// 	$id 				= $post['id'];
	// 	$name 				= $post['name'];
	// 	$surname 			= $post['surname'];
	// 	$email 				= $post['email'];
	// 	$phone 				= $post['phone'];
	// 	$password 			= $post['password'];
	// 	$comfirm_password 	= $post['comfirm_password'];

	// 	if (empty($password)) {
	// 		$password = $this->adminSelectCustom($id)['password'];
	// 	}else{
	// 		$password = sha1($post['password']);
	// 	}

	// 	$update = $this->db->prepare("UPDATE t_admin set
	// 			name=:name,
	// 			surname=:surname,
	// 			email=:email,
	// 			phone=:phone,
	// 			password=:password where id={$id}
	// 		");
	// 	$ok = $update->execute(array(
	// 		'name'=>$name,
	// 		'surname'=>$surname,
	// 		'email'=>$email,
	// 		'phone'=>$phone,
	// 		'password'=>$password
	// 	));

	// 	return $ok;

	// }

	// public function adminDelete($id)
	// {
	// 	$ok = $this->db->query("DELETE from t_admin where id='{$id}'");

	// 	return $ok;

	// }


	// public function adminStatus($post)
	// {
		
	// 	$id 	= $post['id'];
	// 	$status = $post['status'];

	// 	$update = $this->db->prepare("UPDATE t_admin set status=:status where id='{$id}'");
	// 	$ok 	= $update->execute(array('status'=>$status));
	// 	return  $ok;
	// }





}


 ?>