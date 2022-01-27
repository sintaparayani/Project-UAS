<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login.php');
    # code...
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Penyewaan futsal</title>
    <link rel="stylesheet" href = "..">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class = "container">
    <?php include 'navbar.php';?>
</div>
    <div class="container">
        <h3 class="alert alert-info">TAMBAH DATA PENYEWAAN LAPANGAN FUTSAL</h3>

    <?php
    
    require 'setting.php';
    if (isset($_POST['simpan'])) {
        $txtpenyewa = $_POST['txtpenyewa'];
        $txtdurasi = $_POST['txtdurasi'];
        $txttanggal = $_POST['txttanggal'];
        $txtjam = $_POST['txtjam'];
        $txtgambar = $_POST['gambar'];
        $sql = "INSERT INTO sewa VALUES (NULL,'$txtpenyewa','$txtdurasi','$txttanggal','$txtjam','$txtgambar')";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            header('location: index.php');
        } else {
            echo 'Query Error :' .mysqli_error($koneksi);
        }
    }
    ?>
        <form action="#" method="POST">
            <div class="mb-3">
                <label>Nama Lapangan</label>
                <input type="text" name="txtpenyewa" id="txtpenyewa" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="txttanggal" id="txttanggal" class="form-control" >
            </div>

            <div class="mb-3">
                <label>Jam</label>
                <input type="text" name="txtjam" id="txtjam" class="form-control">
            </div>
            
            <div class="mb-3">
                <label>Durasi</label>
                <input type="text" name="txtdurasi" id="txtdurasi" class="form-control">
            </div>

            <div class="mb-3">
                <label>gambar</label>
                <input type="file" name="gambar" id="txtgambar" class="form-control">
            </div>

            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        
        </form>
        </div>
        <div class ="container">
    <?php include 'footer.php';?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


