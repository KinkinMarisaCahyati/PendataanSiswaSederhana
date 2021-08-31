<?php
    class oop{
        function simpan($conn, $tabel, array $field, $redirect)
    { # contoh hasil INSERT INTO `login` (`id`, `username`, `password`) VALUES (NULL, 'admin', 'admin')
        $sql = "INSERT INTO $tabel SET "; #tabel itu login di user ada

        foreach ($field as $key => $value) {  #line perulangan ini akan menghasilkan
            $sql .= " $key = '$value',"; # $sql= key itu field misal isinya 1, trus kalo $value itu isi text nya, koma itu perulangan nya
        } #1. username, 2. =$_POST['user']
        #line22-28 akan menghasilakan jadi digabung fungsi nya insert into login set foreach, akhsinya pake koma
        $sql = rtrim($sql, ','); #jadi execusi ini, dari $sql mau mneghilangkan koma yang akhir
        $jalan = mysqli_query($conn, $sql); #untuk mengirim perintah sql ke server sql

        if ($jalan) {
            echo "<script>alert('Data Berhasil Disimpan');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan');document.location.href='$redirect'</script>";
        }
    }

    function hapus($conn, $tabel, $where, $redirect)
    {
        $sql = "DELETE FROM $tabel WHERE $where";
        $jalan = mysqli_query($conn, $sql); #eksekusi
        if ($jalan) {
            echo "<script>alert('Data Berhasil Dihapus');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus');document.location.href='$redirect'</script>";
        }
    }
    }
?>