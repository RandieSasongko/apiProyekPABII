<?php
    require("koneksi.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $kategori = $_POST["kategori"];
        $deskripsi = $_POST["deskripsi"];
        $type = $_POST ["type"];
        $kapasitas = $_POST ["kapasitas"];
        
        $perintah = "INSERT INTO sparepart(nama, kategori, deskripsi, type, kapasitas) VALUES ('$nama', '$kategori', '$deskripsi', '$type', '$kapasitas')";
        
        $eksekusi = mysqli_query($connect, $perintah);
        $cek = mysqli_affected_rows($connect);
        
        if($cek > 0) {
            $response["kode"] = 1;
            $response["pesan"] = "Sukses Menyimpan Data!";
        }
        else {
            $response["kode"] = 0;
            $response["pesan"] = "Ada Kesalahan, Gagal Menyimpan Data";
        }
    }
    else {
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data!";
    }
    
    echo json_encode($response);
    mysqli_close($connect);
?>
