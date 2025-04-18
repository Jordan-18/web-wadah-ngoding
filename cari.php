 <?php
require 'function.php';
$keyword = $_GET["keyword"] ?? "";
$filter = $_GET["filter"] ?? "";
$query = "SELECT * FROM datawebsite
            WHERE status = 1 AND 
            (
                app LIKE '%$keyword%' OR
                author LIKE '%$keyword%' OR
                link  LIKE '%$keyword%' OR
                tools LIKE '%$keyword%' OR
                jenis LIKE '%$keyword%'
            )
            ORDER BY id desc";

// ####### pending feature
// $query = "SELECT * FROM datawebsite WHERE status = 1 ";
// $query .= "AND (
//                 app LIKE '%$keyword%' OR
//                 author LIKE '%$keyword%' OR
//                 link  LIKE '%$keyword%' OR
//                 tools LIKE '%$keyword%' OR
//                 jenis LIKE '%$keyword%'
//                 ";

// $filterArray = json_decode($filter, true);
// if ($filterArray !== null && is_array($filterArray)) {
//   foreach($filterArray as $k1 => $v1) {
//       foreach($v1 as $k2 => $v2) {
//         $query .= " OR '$k1' LIKE '%$v2%'";
//       }
//   }
// }
// $query .= ")";
// $query .= "ORDER BY id desc";
// ####### pending feature

$data_web = query($query);
$data_web_json = json_encode($data_web);
?>
<div class="row g-2 m-2">
    <div class="label"><strong>Total:</strong> <span id="total">0</span></div>
    <div hidden>
      <strong class="badges-container">Spesific: <span id="badges-tech"></span></strong>
    </div>
</div>

<!-- card -->
<div class="row row-cols-1 row-cols-md-3 g-4 m-2">
  <?php foreach($data_web as $data) :?>
  <div class="col">
    <div class="card">
    <!-- <div class="inner">
        <a href="<?= $data["link"]?>" target="blank"><img style="height: 270px;" src="img/<?= $data["gambar"] ?>" class="card-img-top"></a>
    </div> -->
    <div class="inner" style="position: relative;">
          <a href="<?= $data["link"]?>" target="blank">
            <!-- <img style="height: 270px;" src="img/<?= $data["gambar"] ?>" class="card-img-top"> -->
            <img style="height: 270px;" src="img/<?= htmlspecialchars($data['gambar'], ENT_QUOTES, 'UTF-8') ?>" class="card-img-top">
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
        <p class="card-text">
              <?php
                $myarray = explode(',',$data["tools"]);
                foreach($myarray as $item){
                  $trimmed = trim($item);
                  echo '<span class="badge bg-primary badge-tools" style="margin-right:3px;" onclick="searchBadge(\'' . htmlspecialchars($trimmed, ENT_QUOTES) . '\')">'.$trimmed.'</span>';
                }
              ?>
          </p>
        <p class="card-text" style="float: right; font-style: italic; color: grey;"><?= $data["jenis"]?></p><br><hr>
      <p class="card-text"><small class="text-muted"><?= $data["tanggal"]?></small></p>
      </div>
    </div>
  </div>
    <?php endforeach;?>
</div>
<!-- card-->
</table>

<script>
  $(document).ready( function (){
    var data_web = <?= $data_web_json; ?>;
    $('#total').text(data_web.length)

    const authorCounts = data_web.map(data => data.author).flatMap(authors => authors.split(',')).map(author => author.trim()).reduce((counts, author) => { counts[author] = (counts[author] || 0) + 1;return counts;}, {});
    const toolCounts = data_web.map(data => data.tools).flatMap(tools => tools.split(',')).map(tool => tool.trim()).reduce((counts, tool) => { counts[tool] = (counts[tool] || 0) + 1;return counts;}, {});
    addbadge({authors: authorCounts,tools : toolCounts})
  })
</script>