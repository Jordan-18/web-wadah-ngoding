<?php
  require 'function.php'; 
  $data_web = query("SELECT * FROM datawebsite WHERE status = 1 ORDER BY id desc");
  $data_web_json = json_encode($data_web);
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
    <title>Keifproject ~Royunghonam</title>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
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
      .dropdown-menu-static {
        max-height: 200px;
        overflow-y: auto;
        width: 90%;
      }
      
      .dropdown-menu-static li{
        padding: 5px 10px;
      }
      .badges-container {
          /* white-space: nowrap; */
          overflow-x: auto;
      }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" style="border-bottom: black;position: fixed;top: 0;width: 100%;background-color: white;transition: background-color 1s ease;box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);z-index: 1000;">
  <a class="navbar-brand" href="index">
    <img src="img/ngolah.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Keifproject ~Royunghonam
  </a>
  <form class="d-flex input-search">
    <div class="input-group mb-1">
      
      <input class="form-control dropdown-toggle" autocomplete="off" type="search" name="keyword" type="text" placeholder="Search" data-bs-toggle="dropdown" aria-label="Search" id="keyword">

      <button 
        type="button" 
        class="btn btn-outline-secondary btn-clear" 
        style="border-radius: 0px 5px 5px 0px; "
        onclick="document.getElementById('keyword').value = ''; searchBadge('');"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
        </svg>
      </button>

      <ul class="dropdown-menu dropdown-menu-static" id="dropdown-filter" hidden></ul>
      <a class="btn btn-outline-secondary my-2 my-sm-0 m-2" href="login">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
          <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
          <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
        </svg>
      </a>
    </div>
  </form>
</nav>

<div class="cont">
  <div class="row g-0 m-2">
      <div class="label"><strong>Total:</strong> <span id="total">10</span></div>
      <div hidden>
        <strong class="badges-container">Spesific: <span id="badges-tech"></span></strong>
      </div>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-2 m-2">
    <?php foreach($data_web as $data) :?>
      <div class="col">
        <div class="card">
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
            <!-- <p class="card-text"><?= addtools($data["tools"])?></p> -->
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
<script>
  $(document).ready( function (){

    var data_web = <?= $data_web_json; ?>;

    $('#total').text(data_web.length)
    
    const authorCounts = data_web.map(data => data.author).flatMap(authors => authors.split(',')).map(author => author.trim()).reduce((counts, author) => { counts[author] = (counts[author] || 0) + 1;return counts;}, {});
    const toolCounts = data_web.map(data => data.tools).flatMap(tools => tools.split(',')).map(tool => tool.trim()).reduce((counts, tool) => { counts[tool] = (counts[tool] || 0) + 1;return counts;}, {});

    addbadge({authors: authorCounts, tools : toolCounts})
    
    // ####### pending feature
    var filter = []
    const authorlist = [... new Set(data_web.map(data => data.author).flatMap(authors => authors.split(',')).map(author => author.trim()))]
    const toolslist = [... new Set(data_web.map(data => data.tools).flatMap(tools => tools.split(',')).map(tool => tool.trim()))]

    addFilter({authors: authorlist,tools : toolslist})
    $('.list-item').on('click', function() {
      var filterselected = []
      var groupedFilter = {};

      $('#dropdown-filter .form-check-input').each(function() {
          let isChecked = $(this).prop('checked');
          if (isChecked) {
            filterselected.push($(this)[0].value)
          }
      });
      filter = filterselected
      filter = filter.map(filter => filter.split('-'))

      filter.forEach(filter => {
        let key = filter[0]
        let value = filter[1]

        if (!groupedFilter[key]) { groupedFilter[key] = [] }

        groupedFilter[key].push(value)
      })
      
      filter = groupedFilter

      $('.loader').show();
      $.get('cari.php?filter=' + JSON.stringify(filter),function(data){
          $('.cont').html(data);
      }); 
    })
    // ####### pending feature
  })

  // ####### pending feature
  const addFilter = (value) => {
    let {authors, tools} = value
    const dropdown = $('#dropdown-filter')
    let added = ``

    
    authors.forEach(author => {
      added += `
        <li class="list-item" for="flexCheck${author}">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="author-${author}" id="flexCheck${author}">
            <label class="form-check-label" for="flexCheck${author}">
              ${author}
            </label>
          </div>
        </li>
      `
    })

    added += `<li><hr class="dropdown-divider"></li>`

    tools.forEach(tool => {
      added += `
        <li class="list-item" for="flexCheck${tool}">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="tools-${tool}" id="flexCheck${tool}">
            <label class="form-check-label" for="flexCheck${tool}">
              ${tool}
            </label>
          </div>
        </li>
      `
    })

    dropdown.append(added)

    document.querySelectorAll('.list-item').forEach(label => {
      label.addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        const checkbox = document.getElementById(this.getAttribute('for'));
        checkbox.checked = !checkbox.checked;
      });
    });
  }
  // ####### pending feature

  const addbadge = (value) =>{
    let {authors, tools} = value

    const badgeTech = $('#badges-tech')
    let added = ``
    Object.keys(tools).forEach(key => {
      added += `
        <span 
         class="badge bg-secondary text-white text-sm-center badge-tools" 
         style="margin-right:5px;white-space: nowrap;"
         onclick="searchBadge('${key}')"
        >
          ${key} 
          <span 
            style="margin-left:5px;color: white"
          >
            <strong>
              ${tools[key]}
            </strong>
          </span>
        </span>
      `
    })

    badgeTech.append(added)
  }

  const searchBadge = (value) => {
    $('#keyword').val(value)
    $('#keyword').keyup()
  }
</script>
</body>
</html>

<style>
  .badge-tools{
    pointer-events: all;
    cursor: pointer;
  }

  .btn-clear:hover {
    background-color: rgb(246, 42, 42);
    color: #fff;
  }
</style>