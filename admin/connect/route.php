<?php 

include 'db/db.php';
include 'controller/admin.php';
include 'controller/doctor.php';
include 'model/Admin_model.php';
include 'model/Doctor_model.php';

$admin 	= new Admin;

$doctor = new Doctor;

// if (isset($_POST['admin_insert'])) {
// 	$data = $admin->adminInsert($_POST);

// 	if(gettype($data)=='array'){
// 		$_SESSION['admin_error'] = $data;
// 		header("Location:../admin_insert.php");
// 	}else{
// 		$data ? header("Location:../admin.php") : header("Location:../admin_insert.php"); 
// 	}

// }

// if (isset($_POST['admin_update'])) {
// 	$admin->adminUpdate($_POST)  ? header("Location:../admin.php") : header("Location:../admin_update.php?id=".$_POST['id']); 
// }

if(isset($_POST['login'])){
	$admin->login($_POST) ? header("Location:../index.php") : header("Location:../login.php?login=err");
}

if(isset($_POST['doctor_insert'])) {
    $doctor->insertDoctors($_POST, $_FILES) ? header("Location:../doctor.php") : header("Location:../doctor_insert.php");
}

 if(isset($_POST['doctor_delete'])){
 	$doctor->deleteDoctors($_POST['id']) ? header("Location:../doctor.php") : header("Location:../doctor.php");
 }
if(isset($_POST['doctor_update'])){
    $doctor->updateDoctors($_POST,$_FILES) ? header("Location:../doctor.php") : header("Location:../doctor_update.php?id=".$_POST['id']);
}
 if (isset($_POST['doctor_status'])) {
 	$doctor->doctorStatusUpd($_POST) ? header("Location:../doctor.php") : header("Location:../doctor.php");
 }





?>