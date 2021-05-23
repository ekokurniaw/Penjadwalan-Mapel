<?php 
include '../koneksi.php'; 
$db = new database();
$data_id_kelas = $db->tampil_jurusan();

$i=1;
foreach($data_id_kelas as $row){
 echo $row[0]; 
}

?>

