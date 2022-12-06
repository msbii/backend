<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$pesan = [];
$id = trim($data['id']);
$nama_matakuliah = trim($data['nama_matakuliah']);
$keterangan = trim($data['keterangan']);
//jika nama matakuliah dan keterangan tidak kosong
if ($nama_matakuliah != '' and $keterangan != '') {
 $query = mysqli_query($koneksi, "update matakuliah set 
nama_matakuliah='$nama_matakuliah',keterangan='$keterangan' where id='$id'");
 $pesan['status'] = 'berhasil';
} else {
 $pesan['status'] = 'gagal';
}
echo json_encode($pesan);
echo mysqli_error($koneksi);
?>