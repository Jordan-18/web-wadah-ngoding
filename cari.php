 <?php
require 'function.php';
$keyword = $_GET["keyword"]; 
$query = "SELECT * FROM datawebsite
            WHERE
            app LIKE '%$keyword%' OR
            author LIKE '%$keyword%' OR
            link  LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%' 
            "; 
$data = query($query);
?>
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
      <p class="card-text"><small class="text-muted"><?= $d["tanggal"]?></small></p>
      </div>
    </div>
  </div>
    <?php endforeach;?>
</div>
<!-- card-->
</table>