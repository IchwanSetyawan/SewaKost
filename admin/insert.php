<?php 
    require_once("connection.php");
    $tgl = date('d-m-Y');
    if(isset($_POST['submit'])){
        $data = [
            "nama" => $_POST['nama'],
            "tanggal" => $tgl,
            "jenis_kost" => $_POST['jenis_kost'],
            "lama_nyewa" => $_POST['lama_nyewa'],
            "tarif" => $_POST['tarif'],
            "totalTarif" => $_POST['totalTarif']
        ];
        // var_dump($data);
        // die();
        $penghuni = "INSERT INTO penghuni (Nama_Penghuni) VALUES ('$data[nama]')";
        $test = mysqli_query($koneksi, $penghuni);
        
        
        $kamar = "INSERT INTO kamar (Jenis_Kost,Tarif) VALUES ('$data[jenis_kost]','$data[tarif]')";
        $kamarPost = mysqli_query($koneksi, $kamar);

        // GET ID_Penghuni untuk dijadikan sebagai data Foreign Key table registrasi
        $getIdpenghuni = "SELECT ID_Penghuni FROM penghuni ORDER BY `penghuni`.`ID_Penghuni` DESC";
        $lastRowP = mysqli_query($koneksi, $getIdpenghuni);
        foreach($lastRowP as $row){
            $idPenghuni = $row['ID_Penghuni'];
        }
        // GET ID_Kamar 
        $getIdkamar = "SELECT Kode_KamarKost FROM kamar ORDER BY `kamar`.`Kode_KamarKost` DESC";
        $lastRowK = mysqli_query($koneksi, $getIdkamar);
        foreach($lastRowK as $row){
            $idKamar = $row['Kode_KamarKost'];
        }

        $insert = "INSERT INTO registrasi (Tanggal_Daftar,Lama_Menyewa,Tarif,Total_Tarif,Kode_KamarKost, ID_Penghuni)
                     VALUES ('$data[tanggal]','$data[lama_nyewa]','$data[tarif]','$data[totalTarif]','$idKamar','$idPenghuni')";

        $commit = mysqli_query($koneksi, $insert);
        header("location: admin/viewData.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="insert.css">

</head>
<body>



<div class="container">
    <div class="row">
    <div class="header">
        <h2>Insert new data</h2>
    </div>
        <form action="" method="post">
        
        <div class="form">
            <table>
                    <tr class="img">
                        <td rowspan="8">
                        <img src="../image/data.jpg" alt="img" width="450" height="400">
                        </td>
                    </tr>
                    <tr>
                        <td><b>Nama</b></td>
                        <th><input type="text" name="nama" placeholder="Nama Lengkap"></th>
                    </tr>
                    <tr>
                        <td><b>Jenis Kost</b></td>
                        <td>
                        <select class="styled-select" name="jenis_kost" id="genderSelect" onchange="genderFunction()">  
                            <option value="gender" name="gender" selected="selected">--Gender--</option>                          
                            <option value="wanita" name="wanita">Wanita</option>
                            <option value="pria" name="pria">Pria</option>
                            </select>
                        </td>                        
                    </tr>
                    <tr>
                        <td><b>Lama Menyewa</b></td>
                        <td>
                            <select class="styled-select" name="lama_nyewa" id="bulanSelect" onchange="bulanFunction()">  
                                <option selected disabled>--Jumlah Bulan--</option>                          
                                <option data-bulan="1" value="1 Bulan">1 Bulan</option>
                                <option data-bulan="2" value="2 Bulan">2 Bulan</option>
                                <option data-bulan="3" value="3 Bulan">3 Bulan</option>
                                <option data-bulan="4" value="4 Bulan">4 Bulan</option>
                                <option data-bulan="5" value="5 Bulan">5 Bulan</option>
                                <option data-bulan="6" value="6 Bulan">6 Bulan</option>
                                <option data-bulan="7" value="7 Bulan">7 Bulan</option>
                                <option data-bulan="8" value="8 Bulan">8 Bulan</option>
                                <option data-bulan="9" value="9 Bulan">9 Bulan</option>
                                <option data-bulan="10" value="10 Bulan">10 Bulan</option>
                                <option data-bulan="11" value="11 Bulan">11 Bulan</option>
                                <option data-bulan="12" value="12 Bulan">12 Bulan</option>                                
                            </select>
                        </td>  
                        </td>
                    </tr>
                    <tr>
                        <td><b>Tarif</b></td>
                        <td><input id="showTarifDisplay" type="text" placeholder="Rp." disabled></td>
                        <td><input id="showTarif" type="hidden" name="tarif" placeholder="Rp."></td>

                    </tr>
                    <tr>
                        <td><b>Total Tarif</b></td>
                        <td><input id="totalTarifDisplay" type="text" disabled></td>
                        <td><input id="totalTarif" type="hidden" name="totalTarif"></td>
                    </tr>
                </table>
            </div>
            <input type="submit" name="submit" value="Add New" class="btn-login">
        
        </form>	
            
            <div class="footer"></div>
    </div>    
</div>

<script src="jquery.min.js"></script>
<script>
    var harga  = 0;
    var total = 0;    
    function genderFunction(){
        var gender = document.getElementById("genderSelect").value;        
        
        
        // console.log(bulan)

        if(gender === "pria"){
            harga = 500000
            document.getElementById("showTarifDisplay").value = "Rp. " + harga
        }else{
            harga = 700000
            document.getElementById("showTarifDisplay").value = "Rp. " + harga
        }
        document.getElementById("showTarif").value = harga
    }

    function bulanFunction(){
        // var bulan = document.getElementById("bulanSelect")
        let idBulan = "#bulanSelect";
        let bulan = $("option:selected", $(idBulan)).attr("data-bulan");
        // console.log(bulan) 
        total = harga * bulan;
        console.log(total)
        document.getElementById("totalTarifDisplay").value = "Rp. " + total
        document.getElementById("totalTarif").value = total
    }        
</script>
    
</body>
</html>