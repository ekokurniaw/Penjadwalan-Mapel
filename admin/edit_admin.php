<?php 	
include('../koneksi.php');
$db = new database();
$username = $_GET['username'];
if(! is_null($username))
{
	$data_admin = $db->get_by_username($username);
}
else
{
	header('location:tampil_admin.php');
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
<h3>Ubah Data Akun Admin</h3><br>

<div>
  <form method="post" action="proses_admin.php?action=update">
    <input type="hidden" name="username" value="<?php echo $data_admin['username']; ?>"/>
    <label>Username</label>
  	<input type="text" name="username" value="<?php echo $data_admin['username']; ?>" disabled="true"/>

    <label>Password</label>
    <input type="text" name="password" placeholder="Masukkan password..."  value="<?php echo $data_admin['password']; ?>" required="" maxlength="15">

    <input type="submit" value="Ubah">
  </form>
</div>


</body>
</html>