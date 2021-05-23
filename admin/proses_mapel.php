<?php 
include('../koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_mapel($_POST['nama_mapel'],$_POST['jumlah_jam']);
	header('location:tampil_mapel.php');
}

elseif($action=="update")
{
	$koneksi->update_mapel($_POST['nama_mapel'],$_POST['jumlah_jam'], $_POST['id_mapel']);
	header('location:tampil_mapel.php');
}

elseif($action=="delete")
{
	$id_mapel = $_GET['id_mapel'];
	$koneksi->delete_mapel($id_mapel);
	header('location:tampil_mapel.php');
}
?>