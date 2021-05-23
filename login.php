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
<?php 	
	include('navbar2.php');
?>
<br><br>
<h3>Login Admin</h3><br>
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
<div>
  <form method="post" action="cek_login.php">
  
    <label>Username</label>
    <input type="text" name="username" placeholder="Masukkan username..." required="" maxlength="15">

    <label>Password</label>
    <input type="text" name="password" placeholder="Masukkan password..." required="" maxlength="15">
  
    <input type="submit" value="Tambahkan">
  </form>
</div>

</body>
</html>