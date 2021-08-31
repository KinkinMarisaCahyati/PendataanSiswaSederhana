<?php
    error_reporting(0);
    include 'koneksi.php';
    include 'sistem.php';
    $go = new oop();
    $tabel = 'tb_siswa';
    $field = array(
    'nis' => @$_POST['nis'],
    'nama' => @$_POST['nama'],
    'jk' => @$_POST['jk'],
    'kelas' => @$_POST['kelas'],
);

@$redirect = '?menu=siswa';
@$where = "no = $_GET[no]";
    if (isset($_GET['hapus'])) {
        $go->hapus($conn, $tabel, $where, $redirect);
    }
?>

<!DOCTYPE html>
<html>
    <head>
            <tittle>
                Halaman Siswa
            </tittle>
    </head>
    <body>
        <h2>
            Data Siswa
        </h2>

        <form action="" method="POST" >
            <input type="text" name="query" placeholder="Cari Data" />
            <input type="Submit" name="Cari" value="Search" />
             <?php echo $baris['no'] ?> <?php echo $baris['tb_siswa'] ?> 
             <a href="tambah.php" > Tambah Data </a>
        </form><br>
                    
            <table border="1" cellspacing="0">

                <tr style="font-weight:bold;">
        
                    <td>NO</td>
                    <td>NIS</td>
                    <td>NAMA</td>
                    <td>JENIS KELAMIN</td>
                    <td>TEMPAT KELAHIRAN</td>

                </tr>

                        <?php
                            $no = 1;
                            $query = $_POST['query'];
                                if($query != ''){
                                    $select = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nis LIKE '%".$query."%'
                                    OR nama LIKE '%".$query."%' ");
                                }else{
                                    $select = mysqli_query($conn, "SELECT * FROM tb_siswa");
                                }

                         if(mysqli_num_rows($select)){

                            while($baris = mysqli_fetch_array($select)){

                        ?>

                <tr>

                    <td><?php echo $no++ ?></td>
                    <td><?php echo $baris['nis'] ?></td>
                    <td><?php echo $baris['nama'] ?></td>
                    <td><?php echo $baris['jk'] ?></td>
                    <td><?php echo $baris['tl'] ?></td>
                    
                </tr>

                      <?php }}else{

                        echo '<tr><td colspan ="5"> Tidak Ada Data </td></tr>' ;
       
                      } ?>

            </table>
    </body>
<html>