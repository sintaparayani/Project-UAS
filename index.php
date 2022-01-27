<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
  </head>
  <body>
  
      <div class="container">
      <?php
      include 'navbar_index.php';
      ?>
          <h1>Data Penyewaan Lapangan Futsal</h1>
          <div class="row mt-3">
          <?php
                  require 'admin/setting.php';
                  $sql = "SELECT * FROM sewa";
                  $query = mysqli_query($koneksi, $sql);
                  while($data = mysqli_fetch_object($query)){
                  ?>
              <div class="col-sm-3">
                  <div class="card">
                    <img src="admin/gambar/<?= $data->gambar;?>" alt="">
                    <div class="card-body">
                        <h5 class="cad-title"><?=$data->nama_penyewa;?></h5>
                        <p class="card-text"><?= $data->jam;?></p>
                    </div>
                  </div>
              </div>
              <?php
                  }
              ?>
          </div>
          <?php include 'admin/footer.php' ?>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>