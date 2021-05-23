<?php 	
include('koneksi.php');
$db = new database();
$data_kelas = $db->tampil_kelas();
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
	include('navbar2.php');
	?>
	<br><br><br>
    <center><h1>Website Jadwal Mata Pelajaran</h1><center>
	<center><h2>SMAN 1 Tewang Sangalang Garing</h2><center>
    <br>
    <center><h1>Daftar Kelas</h1><center>
	<br><br>
	<table border="1">
		<tr >
			<th style="text-align: center">No</th>
			<th style="text-align: center">Kelas</th>
			<th style="text-align: center">Jurusan</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data_kelas as $row){
			?>
			<tr>
				<td style="text-align: center"><?php echo $no++; ?></td>
				<td  style="text-align: center"><?php echo $row['kelas']; ?></td>
				<td><?php echo $row['jurusan']; ?></td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>