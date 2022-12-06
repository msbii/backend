<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$pesan = [];
$nama_matakuliah = trim($data['nama_matakuliah']);
$keterangan = trim($data['keterangan']);
//jika nama matakuliah dan keterangan tidak kosong
if ($nama_matakuliah != '' and $keterangan != '') {
 $query = mysqli_query($koneksi, "insert into matakuliah(nama_matakuliah,keterangan) 
values('$nama_matakuliah','$keterangan')");
 $pesan['status'] = 'berhasil';
} else {
 $pesan['status'] = 'gagal';
}
echo json_encode($pesan);
echo mysqli_error($koneksi);
?>