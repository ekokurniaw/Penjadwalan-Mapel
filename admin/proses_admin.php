<?php 
include('../koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_admin($_POST['username'],$_POST['password']);
	header('location:tampil_admin.php');
}

elseif($action=="update")
{
	$koneksi->update_admin($_POST['username'],$_POST['password']);
	header('location:tampil_admin.php');
}

elseif($action=="delete")
{
	$username = $_GET['username'];
	$koneksi->delete_admin($username);
	header('location:tampil_admin.php');
}
?>