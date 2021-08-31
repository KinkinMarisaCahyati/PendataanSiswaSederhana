<?php
    include 'koneksi.php';
    include 'sistem.php';
    $go = new oop();
$tabel = 'tb_siswa';
$field = array(
    'nis' => @$_POST['nis'],
    'nama' => @$_POST['nama'],
    'jk' => @$_POST['jk'],
    'tl' => @$_POST['tl'],
);

@$redirect = '?menu=siswa';
@$where = "no = $_GET[no]";

if (isset($_POST['simpan'])) {
    $go->simpan($conn, $tabel, $field, $redirect);
}


?>
<form method="post">
    <div class="container">
        <table align="center">
            <h3 align="center">INPUT DATA SISWA</h3>
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">NAMA</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">JENIS KELAMIN</label>
                <input type="text" name="jk" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">TEMPAT KELAHIRAN</label>
                <input type="text" name="tl" class="form-control">
            </div>
            <div class="mb-3">
                <?php if (@$_GET['no'] == "") ?>
                <input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN">
        </table>
</form>