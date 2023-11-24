<?php
  require 'function.php'; 
  $data_web = query("SELECT * FROM datawebsite WHERE status = 1 ORDER BY id desc");
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
    <title>Keifproject ~Ngoding ajalah</title>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/main.js"></script>
    <style>
        .cont{
            margin-top:70px !important
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
  <form class="d-flex input-search">
    <input class="form-control me-2" type="search" name="keyword" type="text" placeholder="Search" aria-label="Search" id="keyword">
    <a class="btn btn-outline-secondary my-2 my-sm-0 m-2" href="login">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
      </svg>
    </a>
  </form>
</nav>

<div class="cont">
  <div class="row row-cols-1 row-cols-md-3 g-4 m-2">
    <?php foreach($data_web as $data) :?>
      <div class="col">
        <div class="card">
          <div class="inner" style="position: relative;">
            <a href="<?= $data["link"]?>" target="blank">
              <img style="height: 270px;" src="img/<?= $data["gambar"] ?>" class="card-img-top">
              <div class="detail-button" style="position: absolute; top: 0; right: 0; padding: 10px; background-color: rgba(255, 255, 255, 0.5); border: 1px solid #fff;">
                <a href="detail.php?id=<?= $data["id"]?>" class="btn btn-sm" style="background-color:transparent"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-search mb-1" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                  Detail
                </a>
              </div>
            </a>
          </div>

          <div class="card-body">
            <h5 class="card-title"><?= $data["app"]?></h5>
            <p class="card-text"><?= $data["author"]?></p>
            <p class="card-text"><?= addtools($data["tools"])?></p>
            <p class="card-text" style="float: right; font-style: italic; color: grey;"><?= $data["jenis"]?></p><br><hr>
            <p class="card-text"><small class="text-muted"><?= date("F j, Y, g:i a",strtotime($data["tanggal"]))?></small></p>
          </div>
        </div>
      </div>
      <?php endforeach;?>
  </div>
</div>
<!-- /Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
<script src="js/event.js"></script>
</body>
</html>