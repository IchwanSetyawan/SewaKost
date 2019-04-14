<?php
$koneksi = mysqli_connect("localhost","root","","project_17111031");

//check connection
if (mysqli_connect_errno()){
    echo "Connection to database failed : " . mysqli_connect_error();
}

?>