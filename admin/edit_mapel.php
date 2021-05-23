<?php 	
include('../koneksi.php');
$db = new database();
$id_mapel = $_GET['id_mapel'];
if(! is_null($id_mapel))
{
	$data_mapel = $db->get_by_id_mapel($id_mapel);
}
else
{
	header('location:tampil_mapel.php');
}
?>

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../login.php?pesan=belum_login");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		* {
			font-family: "Montserrat";
		}
		
		input[type=text], select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		}

		input[type=number], select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		}

		input[type=submit] {
		width: 100%;
		background-color: #52c234;
		color: black;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		}

		input[type=submit]:hover {
		background-color: #45a049;
		}

		div {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px;
		width: 50%;
		margin-left: auto;
		margin-right: auto;
		}

		h3{
		text-align: center;
		color: white;
		}
	</style>
</head>

<body bgcolor="#11998e">
<br><br>
<h3>Ubah Data Mata Pelajaran</h3><br>

<div>
  <form method="post" action="proses_mapel.php?action=update">
  <input type="hidden" name="id_mapel" value="<?php echo $data_mapel['id_mapel']; ?>"/>

    <label>Nama Mata Pelajaran</label>
    <input type="text" name="nama_mapel" placeholder="Masukkan nama mata pelajaran..."  value="<?php echo $data_mapel['nama_mapel']; ?>" required="" maxlength="30">

    <label>Jumlah Jam</label>
    <input type="number" name="jumlah_jam" placeholder="Masukkan jumlah jam..."  value="<?php echo $data_mapel['jumlah_jam']; ?>" required="" maxlength="2">

    <input type="submit" value="Ubah">
  </form>
</div>


</body>
</html>