<?php 
include '../koneksi.php'; 
$db = new database();
$data_jurusan = $db->tampil_jurusan();

$i=1;
foreach($data_jurusan as $row){
 echo $row[2]; 
}

?>

