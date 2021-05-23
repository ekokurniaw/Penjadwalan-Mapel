<?php 
include('../koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_jadwal($_POST['hari'],$_POST['jam'],$_POST['jam2'],$_POST['id_mapel'],$_POST['id_kelas']);
	header('location:tampil_jadwal.php');
}

elseif($action=="update")
{
	$koneksi->update_jadwal($_POST['hari'],$_POST['jam'],$_POST['jam2'],$_POST['id_mapel'], $_POST['id_kelas'], $_POST['id_jadwal']);
	header('location:tampil_jadwal.php');
}

elseif($action=="delete")
{
	$id_jadwal = $_GET['id_jadwal'];
	$koneksi->delete_jadwal($id_jadwal);
	header('location:tampil_jadwal.php');
}
?>