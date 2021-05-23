<?php 	
include('../koneksi.php');
$db = new database();
$id_kelas = $_GET['id_kelas'];
if(! is_null($id_kelas))
{
	$data_kelas = $db->get_by_id_kelas($id_kelas);
}
else
{
	header('location:tampil_kelas.php');
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
<h3>Ubah Data Kelas</h3><br>

<div>
  <form method="post" action="proses_kelas.php?action=update">
  <input type="hidden" name="id_kelas" value="<?php echo $data_kelas['id_kelas']; ?>"/>

    <label>Kelas</label>
    <input type="text" name="kelas" placeholder="Masukkan kelas..."  value="<?php echo $data_kelas['kelas']; ?>" required="" maxlength="5">

    <label>Jurusan</label>
    <input type="text" name="jurusan" placeholder="Masukkan jurusan..."  value="<?php echo $data_kelas['jurusan']; ?>" required="" maxlength="15">

    <input type="submit" value="Ubah">
  </form>
</div>


</body>
</html>