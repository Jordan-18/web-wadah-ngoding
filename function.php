<!-- Penghubung database -->
<?php
$conn = mysqli_connect("45.90.230.191","u1584221_jordan","Surabaya2000","u1584221_wadah");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows =[];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
// function tambah
function tambah($data){
    global $conn;
    $user_id = htmlspecialchars($data["user_id_add"]);
    $app = htmlspecialchars($data["app_add"]);
    $author = htmlspecialchars($data["author_add"]);
    $link = htmlspecialchars($data["link_add"]);
    $tags = htmlspecialchars($data["tagsarea_add"]);
    $tanggal = date("Y-m-d H:i:s");
    $jenis = $data["jenis_add"];

    
    // upload gambar
    $GAMBAR = upload();
    if( !$GAMBAR ){
        return false;
    }

    // QUERY INSERT DATA
    $query = "INSERT INTO datawebsite VALUES (
        null,
        '$app',
        '$author',
        '$link',
        '$GAMBAR',
        '$tanggal',
        '$jenis',
        '$tags',
        '$user_id',
        0,
        0,
        1,
        '$tanggal',
        '$tanggal',
        ''
        )";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}



function upload(){

    $NAMAFILE = $_FILES['GAMBAR']['name'];
    $UKURANFILE = $_FILES['GAMBAR']['size'];
    $error = $_FILES['GAMBAR']['error'];
    $tmpName =$_FILES['GAMBAR']['tmp_name'];

// cek apakah tidak ada gambar yg di upload 
    if($error === 4){
        echo"<script>
            alert('Pilih Gambar terlebih dahulu !');
            </script>";
            return false;
    }
// cek apa yg di upload gambar apa bukan 
    $ekstensiGambarvalid =['jpg','png','jpeg','jfif'];
    $ekstensiGambar =explode('.',$NAMAFILE);
    $ekstensiGambar =strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar,$ekstensiGambarvalid)){
        echo"<script>
        alert('Yang anda Upload bukan gambar yang sesuai');
        </script>";
    }

// cek jika ukuran terlalu besar
    if( $UKURANFILE > 1000000){
        echo"<script>
        alert('Ukuran Gambar terlalu besar');
        </script>";
    return false;
    }
// generate nama gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .=$ekstensiGambar;

// lolos pengecekan 
    move_uploaded_file($tmpName,'img/' . $namaFileBaru);

    return $namaFileBaru;
}

// sistem Cari 
function cari($keyword){
    $query = "SELECT * FROM datawebsite
            WHERE
            app LIKE '%$keyword%' OR
            jenis  LIKE '%$keyword%' OR
            link  LIKE '%$keyword%' OR
            tools LIKE '%$keyword%' OR
            author LIKE '%$keyword%'
            ";
    return query($query);
}

// register
function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["pass"]);
    $password2 =mysqli_real_escape_string($conn, $data["pass2"]);
    $insert_at = date('Y-m-d H:i:s');

    // cek konfirmasi password

    $result=mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' AND email = '$email'");

    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('username sudah terdaftar');
        </script>
        "; 
        return false;
    }

    if($password !== $password2){
        echo "
        <script>
            alert('konfirmasi passsword tidak sesuai');
        </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$email','img_profil/person-square.svg','$password','$insert_at','$insert_at','')");

    return mysqli_affected_rows($conn);
}

function addtools($data){
    $myarray = explode(',',$data);
    foreach($myarray as $item){
        echo '<span class="badge bg-primary" style="margin-right:3px;">'.$item.'</span>';
    }
}

// function ubah
function update($data){
    global $conn;
    $id = $data["id_app"];
    $app = htmlspecialchars($data["app"]);
    $author = htmlspecialchars($data["author"]);
    $link = htmlspecialchars($data["link"]);
    $tags = htmlspecialchars($data["tagsarea"]);
    $tanggal = date("Y-m-d H:i:s");
    $jenis = htmlspecialchars($data["jenis"]);
    $GAMBARLAMA = htmlspecialchars($data["GAMBARLAMA"]);
    $status = (htmlspecialchars($data["status"]) == "on" ? '' : 1);
    
// CEK APAKAH USER PILIH GAMBAR BARU ATAU TIDAK 
 if( $_FILES['GAMBAR']['error'] === 4){
     $GAMBAR = $GAMBARLAMA;
 }else {
     $GAMBAR = upload();
 }  

    $query = "UPDATE datawebsite SET 
        app = '$app',
        author = '$author',
        link = '$link',
        gambar = '$GAMBAR',
        updated_at = '$tanggal',
        jenis = '$jenis',
        tools = '$tags',
        status = '$status'
         
        WHERE id = $id;
        ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM datawebsite WHERE id = $id");


    return mysqli_affected_rows($conn);
}
?>
