<?php 
include '../koneksi.php'; 
$db = new database();
$data_id_mapel = $db->tampil_id_mapel();

$i=1;
foreach($data_id_mapel as $row){
 echo $row[0]; 
}

?>

