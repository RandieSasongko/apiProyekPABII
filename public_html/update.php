<?php
    require("koneksi.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $kategori = $_POST["kategori"];
        $deskripsi = $_POST["deskripsi"];
        $type = $_POST["type"];
        $kapasitas = $_POST["kapasitas"];
        
        $perintah = "UPDATE sparepart SET nama = '$nama', kategori = '$kategori', deskripsi = '$deskripsi', type = '$type', kapasitas = '$kapasitas' WHERE id = '$id'";
        
        $eksekusi = mysqli_query($connect, $perintah);
        $cek = mysqli_affected_rows($connect);
        
        if($cek > 0) {
            $response["kode"] = 1;
            $response["pesan"] = "Sukses Mengubah Data!";
        }
        else {
            $response["kode"] = 0;
            $response["pesan"] = "Ada Kesalahan, Gagal Mengubah Data";
        }
    }
    else {
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data!";
    }
    
    echo json_encode($response);
    mysqli_close($connect);
?>