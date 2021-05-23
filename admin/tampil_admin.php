<?php 	
include('../koneksi.php');
$db = new database();
$data_admin = $db->tampil_admin();
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
		table {
		border-collapse: collapse;
		width: 80%;
		margin: 10px auto 10px auto;
		}

		h1, h2{
			color: #fff;
		}

		th, td {
		text-align: left;
		padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}
		tr:nth-child(odd){background-color: #bdc3c7}

		th {
		background-color: #2C7744;
		color: white;
		}
		
		.button {
		background-color: #4CAF50; /* Green */
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		}
		a {
          background-color: #52c234 ;
          color: #fff;
          padding: 7px;
          text-decoration: none;
          font-size: 12px;
    	}
	</style>
</head>

<body bgcolor="#11998e">
	<?php 	
	include('../navbar.php');
	?>
	<br><br><br>
    <center><h1>Website Jadwal Mata Pelajaran</h1><center>
	<center><h2>SMAN 1 Tewang Sangalang Garing</h2><center>
    <br>
    <center><h1>Daftar Akun Admin</h1><center>
	<a href="tambah_admin.php">Tambah Admin</a>
	<br><br>
	<table border="1">
		<tr >
			<th style="text-align: center">No</th>
			<th style="text-align: center">Username</th>
			<th style="text-align: center">Password</th>
			<th style="text-align: center">Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data_admin as $row){
			?>
			<tr>
				<td style="text-align: center"><?php echo $no++; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['password']; ?></td>
				<td style="text-align: center">
					<a href="edit_admin.php?username=<?php echo $row['username']; ?>">Ubah</a>
					<a href="proses_admin.php?action=delete&username=<?php echo $row['username']; ?>">Hapus</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>