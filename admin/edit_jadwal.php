<?php
function get_times ($default = '19:00', $interval = '+20 minutes') {

$output = '';

$current = strtotime('06:00');
$end = strtotime('17:00');

while ($current <= $end) {
	$time = date('H:i', $current);
	$sel = ($time == $default) ? ' selected' : '';

	$output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) .'</option>';
	$current = strtotime($interval, $current);
}

return $output;
} ?>



<?php 	
include('../koneksi.php');
$db = new database();
$id_jadwal = $_GET['id_jadwal'];
$data_kelas = $db->tampil_kelas();
$data_mapel = $db->tampil_mapel();
if(! is_null($id_jadwal))
{
	$data_jadwal = $db->get_by_id_jadwal($id_jadwal);
}
else
{
	header('location:tampil_jadwal.php');
}
?>

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../login.php?pesan=belum_login");
	}
?>
<?php 	
$data = explode("-" , $data_jadwal['jam']);
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-2.1.4.min.js"></script>   <!-- INCLUDE jQuery -->
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
<h3>Ubah Data Jadwal Mata Pelajaran</h3><br>

<div>
  <form method="post" action="proses_jadwal.php?action=update">
  <input type="hidden" name="id_jadwal" value="<?php echo $data_jadwal['id_jadwal']; ?>"/>

  <label>Hari</label>
    <select type="text" id="hari" name="hari">
	  <option value="<?php echo $data_jadwal['hari']; ?>" ><?php echo $data_jadwal['hari']; ?></option>
      <option value="Senin">Senin</option>
      <option value="Selasa">Selasa</option>
      <option value="Rabu">Rabu</option>
	  <option value="Kamis">Kamis</option>
      <option value="Jumat">Jumat</option>
      <option value="Sabtu">Sabtu</option>
    </select>

	<label>Jam</label>
    <select name="jam">
		<option value="<?php echo $data[0];?>"><?php echo $data[0];?></option>
		<?php echo get_times(); ?>
	</select>
	<select name="jam2">
		<option value="<?php echo $data[1];?>"><?php echo $data[1];?></option>
		<?php echo get_times(); ?>
	</select>
  
  
    <label>Nama Mata Pelajaran</label>
    <select type="text" name="nama_mapel" id="nama_mapel" required>
		<option>--- Pilih mata pelajaran ---</option>
		<?php 
				$i=1;
				foreach($data_mapel as $row){
			?>
        <option><?php echo $row['nama_mapel'];?> </option>
        <?php } ?>
    </select>
	<input type="hidden" name="id_mapel" id="id_mapel"/>

    <label>Kelas</label>
	<select type="text" name="kelas" id="kelas" required>
		<option>--- Pilih kelas ---</option>
		<?php 
				$i=1;
				foreach($data_kelas as $row){
			?>
        <option><?php echo $row['kelas'];?> </option>
        <?php } ?>
    </select>

	<label>Jurusan</label>
	<input type="text" name="jurusan" id="jurusan" readonly="true"/>
	<input type="hidden" name="id_kelas" id="id_kelas"/>

    <input type="submit" value="Ubah">
  </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){

    $('#kelas').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
      var kelasfromfield = $('#kelas').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
      $.ajax({        // Memulai ajax
        method: "POST",      
        url: "ajaxfile_jurusan.php",    // file PHP yang akan merespon ajax
        data: { kelas: kelasfromfield}   // data POST yang akan dikirim
      })
        .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
            $('#jurusan').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
        });
    })
    });
  </script>

<script type="text/javascript">
    $(document).ready(function(){

    $('#kelas').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
      var kelasfromfield = $('#kelas').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
      $.ajax({        // Memulai ajax
        method: "POST",      
        url: "ajaxfile_id_kelas.php",    // file PHP yang akan merespon ajax
        data: { kelas: kelasfromfield}   // data POST yang akan dikirim
      })
        .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
            $('#id_kelas').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
        });
    })
    });
  </script>

<script type="text/javascript">
    $(document).ready(function(){

    $('#nama_mapel').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
      var nama_mapelfromfield = $('#nama_mapel').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
      $.ajax({        // Memulai ajax
        method: "POST",      
        url: "ajaxfile_id_mapel.php",    // file PHP yang akan merespon ajax
        data: { nama_mapel: nama_mapelfromfield}   // data POST yang akan dikirim
      })
        .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
            $('#id_mapel').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama' 
        });
    })
    });
  </script>
</body>
</html>