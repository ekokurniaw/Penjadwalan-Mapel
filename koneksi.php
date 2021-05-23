<?php 
class database{

	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "sman1tewangsangalang";
	var $koneksi = "";
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	function tampil_mapel()
	{
		$data = mysqli_query($this->koneksi,"select * from tabel_mapel");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

    function tambah_mapel($nama_mapel,$jumlah_jam)
	{
		mysqli_query($this->koneksi,"insert into tabel_mapel values ('','$nama_mapel','$jumlah_jam')");
	}

    function get_by_id_mapel($id_mapel)
	{
		$query = mysqli_query($this->koneksi,"select * from tabel_mapel where id_mapel='$id_mapel'");
		return $query->fetch_array();
	}

    function update_mapel($nama_mapel,$jumlah_jam,$id_mapel)
	{
		$query = mysqli_query($this->koneksi,"update tabel_mapel set nama_mapel='$nama_mapel',jumlah_jam='$jumlah_jam' where id_mapel='$id_mapel'");
	}

    function delete_mapel($id_mapel)
	{
		$query = mysqli_query($this->koneksi,"delete from tabel_mapel where id_mapel='$id_mapel'");
	}






	function tampil_kelas()
	{
		$data = mysqli_query($this->koneksi,"select * from tabel_kelas");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

    function tambah_kelas($kelas,$jurusan)
	{
		mysqli_query($this->koneksi,"insert into tabel_kelas values ('','$kelas','$jurusan')");
	}

    function get_by_id_kelas($id_kelas)
	{
		$query = mysqli_query($this->koneksi,"select * from tabel_kelas where id_kelas='$id_kelas'");
		return $query->fetch_array();
	}

    function update_kelas($kelas,$jurusan,$id_kelas)
	{
		$query = mysqli_query($this->koneksi,"update tabel_kelas set kelas='$kelas',jurusan='$jurusan' where id_kelas='$id_kelas'");
	}

    function delete_kelas($id_kelas)
	{
		$query = mysqli_query($this->koneksi,"delete from tabel_kelas where id_kelas='$id_kelas'");
	}
	





	function tampil_admin()
	{
		$data = mysqli_query($this->koneksi,"select * from tabel_admin");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

    function tambah_admin($username,$password)
	{
		mysqli_query($this->koneksi,"insert into tabel_admin values ('$username','$password')");
	}

    function get_by_username($username)
	{
		$query = mysqli_query($this->koneksi,"select * from tabel_admin where username='$username'");
		return $query->fetch_array();
	}

    function update_admin($username,$password)
	{
		$query = mysqli_query($this->koneksi,"update tabel_admin set password='$password' where username='$username'");
	}

    function delete_admin($username)
	{
		$query = mysqli_query($this->koneksi,"delete from tabel_admin where username='$username'");
	}
	





	function tampil_jadwal()
	{
		$data = mysqli_query($this->koneksi,"SELECT j.id_jadwal, hari, jam, m.id_mapel, nama_mapel, k.id_kelas, kelas, jurusan
		FROM tabel_jadwal_mapel j
		
		JOIN tabel_mapel m ON j.id_mapel = m.id_mapel 
		JOIN tabel_kelas k ON j.id_kelas = k.id_kelas
		
		ORDER BY id_jadwal");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

    function tambah_jadwal($hari,$jam,$jam2,$id_mapel,$id_kelas)
	{
		mysqli_query($this->koneksi,"insert into tabel_jadwal_mapel values ('','$hari','$jam-$jam2','$id_mapel','$id_kelas')");
	}

    function get_by_id_jadwal($id_jadwal)
	{
		$query = mysqli_query($this->koneksi,"
		
		SELECT j.id_jadwal, hari, jam, m.id_mapel, nama_mapel, k.id_kelas, kelas, jurusan
		FROM tabel_jadwal_mapel j
		
		JOIN tabel_mapel m ON j.id_mapel = m.id_mapel 
		JOIN tabel_kelas k ON j.id_kelas = k.id_kelas where id_jadwal='$id_jadwal'
		
		");
		return $query->fetch_array();
	}

    function update_jadwal($hari,$jam,$jam2,$id_mapel,$id_kelas,$id_jadwal)
	{
		$query = mysqli_query($this->koneksi,"update tabel_jadwal_mapel set hari='$hari', jam='$jam-$jam2', id_mapel='$id_mapel' ,id_kelas='$id_kelas'  where id_jadwal='$id_jadwal'");
	}

    function delete_jadwal($id_jadwal)
	{
		$query = mysqli_query($this->koneksi,"delete from tabel_jadwal_mapel where id_jadwal='$id_jadwal'");
	}



	function tampil_jurusan()
	{
		$kelas = $_POST['kelas']; 
		$data = mysqli_query($this->koneksi,"select * from tabel_kelas where kelas='$kelas'");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function tampil_id_mapel()
	{
		$nama_mapel = $_POST['nama_mapel']; 
		$data = mysqli_query($this->koneksi,"select * from tabel_mapel where nama_mapel='$nama_mapel'");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	
}
?>