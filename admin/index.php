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
    
    <div class="container">
    <?php include 'navbar.php';?>

</div>
    <div class="container">

        <h2 class = "alert alert-info">DATA PENYEWAAN LAPANGAN FUTSAL</h2>
        <a href="tambah.php" class="btn btn-info">Tambah Data</a>

        <table class="table table-bordered">
            <thread>
                <tr>
                    <th>No</th>
                    <th>Nama Lapangan</th>
                    <th>Durasi</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>gambar</th>
                    <th>Aksi</th>
                </tr>
            </thread>

            <tbody>
            <?php
            require 'setting.php';
            $query = "SELECT * FROM sewa";
            $sql = mysqli_query($koneksi,$query);
            $no = 1;
            while ($data = mysqli_fetch_object($sql)){
            ?>

            <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data->nama_penyewa; ?> </td>
                <td> <?php echo $data->durasi; ?> </td>
                <td> <?php echo $data->tanggal; ?> </td>
                <td> <?php echo $data->jam; ?> </td>
                <td> <a href="gambar/<?php echo $data->gambar; ?>"><?php echo $data->gambar; ?></a></td>


                <td>
                    <a href="edit.php?id=<?=$data->id_penyewaan;?>">
                    <input type = "submit" value="edit" class="btn btn-warning">
                    </a>
                    <?php
                    if ($_SESSION['hak_akses'] == 'admin') {}

                    ?>
                    
                    <a href="hapus.php?id=<?=$data->id_penyewaan;?>">
                    <input type = "submit" value="hapus" class="btn btn-danger" onclick="return confirm('yakin hapus data?')">
                    </a>
            </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="container">
    <?php include 'footer.php';?>
        </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


