<?php
    session_start();
    if (!isset($_SESSION["login"])){
        header("Location:login.php");
        exit;
    }
    require 'function.php';
    $username = $_SESSION["username"]  ;
    $user_data = query("SELECT * FROM user WHERE username = '$username'");
    $data_web = query("SELECT * FROM datawebsite ORDER BY id desc");
    $data_web_json = json_encode($data_web);

    // insert
    if (isset($_POST["submit"])) {
        if (tambah($_POST) > 0) {
            echo "
            <script>
                alert('Data Berhasil Ditambah');
                document.location.href = 'index';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Gagal Ditambah');
                document.location.href = 'dashboard';
            </script>
            ";
        }
    }

    // update
    if(isset($_POST["update"])){
        if ( update($_POST) > 0){
            echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'dashboard';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = 'dashboard';
            </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Wadah Project</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/main.js"></script>
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><?= $user_data[0]["username"] ?></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?= 'img/'.$user_data[0]["profil"] ?>" height="160px" width="160px" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#data">Data's</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#tambahdata">Tambah</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index">Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid p-0">
            <section class="resume-section" id="data">
                <div class="resume-section-content">
                    <table class="table" id="table_project">
                    </table>
                </div>
            </section>
            <hr class="m-0" />
            <section class="resume-section" id="tambahdata">
                <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col">
                        <div class="mb-3">
                            <label for="app" class="form-label">Nama Karya Mu</label>
                            <input type="hidden" class="form-control" id="user_id_add" aria-describedby="user_id_add" name="user_id_add">
                            <input type="text" class="form-control" id="app_add" aria-describedby="app_add" name="app_add" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="author" class="form-label">Lalu Namamu siapa ?</label>
                            <input type="text" class="form-control" id="author_add" aria-describedby="author_add" name="author_add" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="link" class="form-label">Link nya dong....</label>
                            <input type="text" class="form-control" id="link_add" aria-describedby="link_add" name="link_add" required>
                        </div>
                        
                        <div class="content mb-3">
                            <div class="col-md-3">
                            <label for="link" class="form-label">Tags</label>
                            <div class="input-group">
                            <input type="text" class="form-control" id="tags" list="datalistOptions" autocomplete="off">
                            <datalist id="datalistOptions">
                                        <option value="PHP">
                                        <option value="Laravel">
                                        <option value="CodeIgniter">
                                        <option value="JavaScript">
                                        <option value="Express">
                                        <option value="Golang">
                                        <option value="Mysql">
                                        <option value="Nosql">
                            </datalist>
                            <button type="button" class="btn btn-outline-secondary" onclick="addtags();">Add Tags</button>
                            </div>
                            </div>

                            <textarea class="form-control mt-3" id="tagsarea_add" name="tagsarea_add" placeholder="Tags Area" readonly="" required></textarea>
                        </div>

                    <!-- pilihan app -->
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control" name="jenis_add" required>
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
                        <input type="file" class="form-control"  name="GAMBAR" id="GAMBAR" required>
                        </div>
                    </div>
                
                

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="onCancel();">Batal</button>
                    <button type="submit" class="btn btn-info" name="submit">Tambahkan</button>
                    </div>
                </form>
                </div>
            </section>
            <hr class="m-0" />
        </div>


        <!-- Modal -->
        <div class="modal fade" id="ModalDataEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalDataEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalDataEditLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype ="multipart/form-data">
                <div class="modal-body">
                    <div class="container">
                            <img id="img_lama">
                            <input type="hidden" id="id_app" name="id_app">
                            <div class="mb-3 row">
                                <label for="app" class="col-sm-2 col-form-label">Nama App</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="app" name="app">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="author" class="col-sm-2 col-form-label">Creator</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="author" name="author">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="jenis" name="jenis">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="link" class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="link" name="link">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tools" class="col-sm-2 col-form-label">Tools</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="tools" name="tagsarea">
                                </div>
                            </div>
                            <div class="mb-3 row" hidden>
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar Lama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" id="gambarlama" name="GAMBARLAMA">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-plaintext" id="GAMBAR" name="GAMBAR">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" class="form-check-input" id="status" name="status">
                                    <label class="form-check-label" for="status">
                                        Hide
                                    </label>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
    <script>
        $(document).ready( function ()
        {
            var data_web = <?= $data_web_json; ?>;
            
          $('#table_project').DataTable({
                processing: true,
                data : data_web,
                pageLength: 7,
                order: [[0, 'desc']],
                fnRowCallback: function(row,data,index,rowIndex){
                    var app_rating = 0
                    if(data.jumlah_rating == 0 && data.user_rating == 0){
                        app_rating
                    }else{
                        app_rating = (parseInt(data.jumlah_rating) / parseInt(data.user_rating))
                    }
                    $('td:eq(3)',row).html(new Date(data.tanggal).toDateString())
                    
                    if(app_rating < 2){
                        $('td:eq(5)',row).html(
                            `${app_rating.toFixed(1)}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" style="color:red;" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>`)
                    }else if(app_rating < 4){
                        $('td:eq(5)',row).html(
                            `${app_rating.toFixed(1)}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" style="color:grey;" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>`)
                    }else{
                        $('td:eq(5)',row).html(
                            `${app_rating.toFixed(1)}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" style="color:orange;" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>`)
                    }

                    if(data.status == 1){
                        $('td:eq(6)',row).html(`
                        <span class="badge bg-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                            Show
                        </span>`);
                    }else{
                        $('td:eq(6)',row).html(`
                        <span class="badge bg-secondary"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                            </svg>
                            Hide
                        </span>`);
                    }
                    $('td:eq(7)',row).html(` 
                        <a class="badge bg-danger" style="text-decoration: none;" href="hapus.php?id=${data.id}" onclick="return confirm('Yakin ?');">Delete</a>
                        <a class="badge bg-warning " style="text-decoration: none;"href="${data.link}" target="_blank">Link</a>
                        <button type="button" class="badge bg-info" 
                            style="text-decoration: none; border:none;" 
                            data-data_id="${data.id}" 
                            data-app="${data.app}"
                            data-author="${data.author}"
                            data-gambar="${data.gambar}"
                            data-jenis="${data.jenis}"
                            data-tools="${data.tools}"
                            data-status="${data.status}"
                            data-link="${data.link}"
                            onclick="onEdit(this)">
                                Edit
                        </button>
                    `)
                },
                columns: [
                    {data: 'id', name: 'id', width:'5%', title: "id"},
                    {data: 'app', name: 'app', title: "App Name"},
                    {data: 'author', name: 'author', title: "Creator"},
                    {data: 'tanggal', name: 'tanggal', title: "Dibuat"},
                    {data: 'jenis', name: 'jenis', title: "Jenis"},
                    {data: 'jumlah_rating', name: 'jumlah_rating', title: "Rating"},
                    {data: 'status', name: 'status', title: "status"},
                    {data: 'user_id', name: 'user_id', title: "Action"},
                    // {data: 'tools', name: 'tools', title: "tools"},
                    // {data: 'link', name: 'link', title: "link"},
                    // {data: 'gambar', name: 'gambar', title: "gambar"},
                    // {data: 'user_rating', name: 'user_rating', title: "user_rating"},
                    // {data: 'created_at', name: 'created_at', title: "created_at"},
                    // {data: 'updated_at', name: 'updated_at', title: "updated_at"},
                    // {data: 'deleted_at', name: 'updated_at', title: "updated_at"}
                ],columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]
            });
        });

        onEdit = (el) => {
            const hasil = $(el).data();

            $('#app').val(hasil.app)
            $('#author').val(hasil.author)
            $('#jenis').val(hasil.jenis)
            $('#tools').val(hasil.tools)
            $('#link').val(hasil.link)
            $('#id_app').val(hasil.data_id)
            $('#gambarlama').val(hasil.gambar)
            $('#img_lama').replaceWith(`
                <img 
                    id="img_lama"
                    src="img/${hasil.gambar}" 
                    class="img-fluid" 
                    alt="Responsive image" 
                    style="
                        display: block;
                        border: 1px solid;
                        height:50%; 
                        width:50%; 
                        margin-left: auto;
                        margin-right: auto;
                    ">`)
            document.getElementById('status').checked= false
            if(hasil.status != 1){document.getElementById('status').checked= true}

            $('#ModalDataEdit').modal('show')
        }

        addtags = () => {
            var data = $('#tags').val();
            var textarea = document.getElementById('tagsarea_add')

            if (textarea.value == "") {
                textarea.value += `${data}`;
            } else {
                textarea.value += `,${data}`;
            }
            $('#tags').val("");
        }

        onCancel = () => {
            $('#app_add').val("");
            $('#author_add').val("");
            $('#link_add').val("");
            $('#tagsarea_add').val("");
            $('#inputState').val("");
            $('#GAMBAR').val("");
        }
    </script>
</html>
