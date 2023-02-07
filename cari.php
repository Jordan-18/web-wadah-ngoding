 <?php
require 'function.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM datawebsite
            WHERE
            app LIKE '%$keyword%' OR
            author LIKE '%$keyword%' OR
            link  LIKE '%$keyword%' OR
            tools LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%' 
            ORDER BY id desc"; 
$data_web = query($query);
?>
<!-- card -->
<div class="row row-cols-1 row-cols-md-3 g-4 m-2">
  <?php foreach($data_web as $data) :?>
  <div class="col">
    <div class="card">
    <div class="inner">
        <a href="<?= $data["link"]?>" target="blank"><img style="height: 270px;" src="img/<?= $data["gambar"] ?>" class="card-img-top"></a>
    </div>
      <div class="card-body">
        <h5 class="card-title"><?= $data["app"]?></h5>
        <p class="card-text"><?= $data["author"]?></p>
        <p class="card-text"><?= addtools($data["tools"])?></p>
        <p class="card-text" style="float: right; font-style: italic; color: grey;"><?= $data["jenis"]?></p><br><hr>
      <p class="card-text"><small class="text-muted"><?= $data["tanggal"]?></small></p>
      </div>
    </div>
  </div>
    <?php endforeach;?>
</div>
<!-- card-->
</table>