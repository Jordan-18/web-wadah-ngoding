<!-- Penghubung database -->
<?php
    $conn = mysqli_connect("localhost","root","","ngoding");

    function query($query){
        global $conn;
    // ambil data (fecth) dari objek $result
    // ada 4 langkah
    // mysqli_fetch_row()       //Mengembalikan array numerik
    // mysqli_fetch_assoc()     //Mengembalikan array assosiative
    // mysqli_fetch_array()     //Dapat mengembalikan keduanya
    // mysqli_fetch_object()    //mengembalikan object
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
    $app = htmlspecialchars($data["app"]);
    $author = htmlspecialchars($data["author"]);
    $link = htmlspecialchars($data["link"]);
    $tanggal = date("Y-m-d H:i:s");
    $jenis = $data["jenis"];

    
    // upload gambar
    $GAMBAR = upload();
    if( !$GAMBAR ){
        return false;
    }

// QUERY INSERT DATA
    $query = "INSERT INTO datawebsite VALUES (null,'$app','$author','$link','$GAMBAR','$tanggal','$jenis')";
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
            namaweb LIKE '%$keyword%' OR
            jenis  LIKE '%$keyword%' OR
            author LIKE '%$keyword%'
            ";
    return query($query);
}
?>
