<?php

include("../connection.php");
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $sql = "DELETE registrasi, penghuni, kamar FROM registrasi 
          INNER JOIN penghuni ON registrasi.No_Registrasi = penghuni.ID_Penghuni
          INNER JOIN kamar ON registrasi.No_Registrasi = kamar.Kode_KamarKost WHERE registrasi.No_Registrasi = '$id'";
  $data = mysqli_query($koneksi, $sql);
  header("location: viewData.php");
}

?>