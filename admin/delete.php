<?php

include("connection.php");
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM registrasi WHERE No_Registrasi = '$id'";
  $aksi = $pdo->query($delete);

  if($aksi){
    header("location: viewData.php");
  }else{
    echo "<script>alert('Gagal Delete Data!')</script>";
  }

}

?>