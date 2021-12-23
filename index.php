<?php
  require 'function.php'; 
  $data = query("SELECT * FROM datawebsite");

// jika tombol cari ditekan 
if(isset($_POST['cari'])){
  $data =cari($_POST["keyword"]);
}

// tambah
if (isset($_POST["submit"])) {
  // cek apakah data tambah berhasil
  if (tambah($_POST) > 0) {
      echo "
      <script>
          alert('Data Berhasil Ditambah');
          document.location.href = 'index.php';
      </script>
      ";
  } else {
      echo "
      <script>
          alert('Data Gagal Ditambah');
          document.location.href = 'index.php';
      </script>
      ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/ngo2.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Ngoding Ajalah</title>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/main.js"></script>
    
</head>
<body>

<!-- Image and text -->
<nav class="navbar navbar-warning bg-warning" style="border-bottom: black;">
  <a class="navbar-brand" href="#">
    <img src="img/ngolah.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Ngoding Ajalah
  </a>
  <button class="btn btn-outline-success my-2 my-sm-0 m-2" type="submit" data-toggle="modal" data-target="#staticBackdrop">+</button>
</nav>
<form action="" method="POST" class="d-flex" style="padding: 10px;">
      <input class="form-control mr-2" name="keyword" type="text" placeholder="Search" aria-label="Search" id="keyword" autofocus>
      <button class="btn btn-outline-success" type="submit" name="cari" id="cari">Search</button>
</form>
<!-- /image and text -->
<div class="cont">

<!-- card -->
<div class="row row-cols-1 row-cols-md-3 g-4 m-2">
  <?php foreach($data as $d) :?>
  <div class="col">
    <div class="card">
    <div class="inner">
        <a href="<?= $d["link"]?>" target="blank"><img style="height: 270px;"src="img/<?= $d["gambar"] ?>" class="card-img-top"></a>
    </div>
      <div class="card-body">
        <h5 class="card-title"><?= $d["app"]?></h5>
        <p class="card-text"><?= $d["author"]?></p>
        <p class="card-text" style="float: right; font-style: italic; color: grey;"><?= $d["jenis"]?></p><br><hr>
      <p class="card-text"><small class="text-muted"><?= date("F j, Y, g:i a",strtotime($d["tanggal"]))?></small></p>
      </div>
    </div>
  </div>
    <?php endforeach;?>
</div>
<!-- /card-->
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Karya Milik Mu</h5>
        <button type="button" class="btn-close text-reset" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="app" class="form-label">Nama Karya Mu</label>
            <input type="text" class="form-control" id="app" aria-describedby="app" name="app">
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Lalu Namamu siapa ?</label>
            <input type="text" class="form-control" id="author" aria-describedby="author" name="author">
          </div>
          <div class="mb-3">
            <label for="link" class="form-label">Link nya dong....</label>
            <input type="text" class="form-control" id="link" aria-describedby="link" name="link">
          </div>
<!-- pilihan app -->
<div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="jenis">
        <option selected>Pilih...</option>
        <option value="website">Website</option>
        <option value="android">Android</option>
        <option value="AI">Artificial Intelligence</option>
        <option value="Lainnya..">Lainnya....</option>
      </select>
    </div>
<!-- pilihan app -->
          <div class="mb-3">
            <label for="GAMBAR" class="form-label">Screenshot App kamu ya</label>
            <input type="file" class="form-control"  name="GAMBAR" id="GAMBAR">
            <!-- <div class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
      </div>
      </form>

      </div>
    </div>
  </div>
</div>
<!-- /Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
</body>
</html>