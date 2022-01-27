<!DOCTYPE html>
<html lang="en">
<head>

    <title>Tambah Data Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h3 class="alert alert-info">EDIT DATA PENYEWAAN LAPANGAN FUTSAL</h3>

    <?php
    require 'setting.php';
    if (isset($_POST['simpan'])) {
        $id=$_GET['id'];
        $txtpenyewa = $_POST['txtpenyewa'];
        $txtdurasi = $_POST['txtdurasi'];
        $txttanggal = $_POST['txttanggal'];
        $txtjam = $_POST['txtjam'];

        $sql="UPDATE sewa SET nama_penyewa='$txtpenyewa',durasi='$txtdurasi',tanggal='$txttanggal',jam='$txtjam' WHERE id_penyewaan=$id";
        $query =mysqli_query($koneksi, $sql);

        if (query) {
            header('location: index.php');
        } else {
            echo 'Query Error :' .mysqli_error($koneksi);
        }
        
    }else{
        $id=$_GET['id'];
        $query="SELECT * FROM sewa WHERE id_penyewaan=$id";
        $sql=mysqli_query($koneksi,$query);
        $data=mysqli_fetch_object($sql);
    }
    
    ?>
        <form action="#" method="post">
            <input type="hidden" name="txtid" value="<?=$id?>">
            <div class="mb-3">
                <label>Nama Lapangan</label>
                <input type="text" name="txtpenyewa" id="txtpenyewa" class="form-control" value="<?=$data->nama_penyewa;?>">
            </div>

            <div class="mb-3">
                <label>Durasi</label>
                <input type="text" name="txtdurasi" id="txtdurasi" class="form-control" value="<?=$data->durasi;?>">
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="txttanggal" id="txttanggal" class="form-control" value="<?=$data->tanggal;?>">
            </div>

            <div class="mb-3">
                <label>Jam</label>
                <input type="text" name="txtjam" id="txtjam" class="form-control" value="<?=$data->jam;?>">
            </div>

            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
            <a href="index.php" class="btn btn-secondary">Kembali</a>

    </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>