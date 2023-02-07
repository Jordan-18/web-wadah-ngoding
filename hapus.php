<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'function.php'; 


$id = $_GET["id"];

if(hapus($id)){
    echo "
    <script>
        alert('Data telah Dihapus');
        document.location.href = 'index.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Data Gagal Dihapus');
        document.location.href = 'index.php';
    </script>
    ";
}

?>