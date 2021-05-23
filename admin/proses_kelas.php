<?php 
include('../koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_kelas($_POST['kelas'],$_POST['jurusan']);
	header('location:tampil_kelas.php');
}

elseif($action=="update")
{
	$koneksi->update_kelas($_POST['kelas'],$_POST['jurusan'], $_POST['id_kelas']);
	header('location:tampil_kelas.php');
}

elseif($action=="delete")
{
	$id_kelas = $_GET['id_kelas'];
	$koneksi->delete_kelas($id_kelas);
	header('location:tampil_kelas.php');
}
?>