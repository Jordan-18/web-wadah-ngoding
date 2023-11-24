<?php
  require 'function.php'; 
  $data_web = query("SELECT * FROM datawebsite WHERE status = 1 and id = ".$_GET['id']." ");
  $data_img = query("SELECT * FROM galleries WHERE induk_id = ".$_GET['id']." ");

  $tools = '';
  $img = array();
  array_push($img, array(
    'img' => 'img/'.$data_web[0]['gambar'],
  ));
  foreach($data_img as $data){
    array_push($img, array(
      'img' => 'img/'.$data['galleries_img'],
    ));
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/ngo2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title><?= $data_web[0]['app']; ?> ~Keifproject</title>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/main.js"></script>
    <style>
        .cont{
            margin-top:70px !important
        }
        .nav-link.active {
          background: linear-gradient(to bottom, #e9ecef, white) !important;
          color: black !important;
          font-weight: 1000;
        }
        @media screen and (max-width: 1000px) {
            .input-search{
                width: 100%;
                margin: 10px 10px 0px 10px;
            }
            .cont{
                margin-top:110px !important
            }
        }
    </style>
    
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="border-bottom: black;position: fixed;top: 0;width: 100%;background-color: white;transition: background-color 1s ease;box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);z-index: 1000;">
  <a class="navbar-brand" href="index">
    <img src="img/ngolah.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Keifproject ~Ngoding ajalah
  </a>
</nav>

<div class="cont">
  <div class="row row-cols-1 row-cols-md-3 g-4 m-2">
    <div class="col-md-5">
      <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php foreach($img as $key => $value) :?>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="<?= $key ?>" class="active" aria-current="true" aria-label="Slide <?= $key; ?>"></button>
          <?php endforeach; ?>
        </div>
        <div class="carousel-inner" style="border-radius: 5px;">
          <?php foreach($img as $key => $value) :?>
            <div class="carousel-item <?= $key == 0 ? 'active' : '';?>">
              <img src="<?= $value['img'] ?>" class="d-block w-100">
            </div>
          <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  
    <div class="col-md-7">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-detail-tab" data-bs-toggle="pill" data-bs-target="#pills-detail" type="button" role="tab" aria-controls="pills-detail" aria-selected="true">Detail</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-flow-tab" data-bs-toggle="pill" data-bs-target="#pills-flow" type="button" role="tab" aria-controls="pills-flow" aria-selected="false">Flow</button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">

          <div class="mb-3 row">
            <label for="staticApp" class="col-sm-2 col-form-label">App Name</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticApp" value="<?= $data_web[0]['app']; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="staticJenis" class="col-sm-2 col-form-label">Jenis</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticJenis" value="<?= $data_web[0]['jenis']; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="staticDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticDeskripsi" value="<?= $data_web[0]['deskripsi']; ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="staticTools" class="col-sm-2 col-form-label">Tools</label>
            <div class="col-sm-10 mt-2">
              <?= addtools($data_web[0]['tools']); ?>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="staticLink" class="col-sm-2 col-form-label">Link</label>
            <div class="col-sm-10">
              <a href="<?= $data_web[0]['link']; ?>" target="_blank" class="btn btn-secondary">Go to Website</a>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="pills-flow" role="tabpanel" aria-labelledby="pills-flow-tab">
          <?= htmlspecialchars_decode($data_web[0]['flow']); ?>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
<script src="js/event.js"></script>
</body>
</html>