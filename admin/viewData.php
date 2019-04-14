<?php
    require_once('../connection.php');

    $query = "SELECT penghuni.Nama_Penghuni, kamar.Jenis_Kost, registrasi.Tanggal_Daftar, registrasi.Lama_Menyewa, kamar.Tarif, registrasi.Total_Tarif
    FROM registrasi 
    JOIN kamar ON registrasi.No_Registrasi = kamar.Kode_KamarKost
    JOIN penghuni ON registrasi.No_Registrasi = penghuni.ID_Penghuni";
    

    $data = mysqli_query($koneksi, $query);

?>
    <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>halaman utama</title>
	<link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="header">
            <h1>Admin Page</h1>
            <h3>Welcome you're login.</h3>
           
            
        </div>
        <div class="subHeader"></div>
            <div class="body">
                <table border="1" width="1240px">
                    <thead>            
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kost</th>                            
                            <th>Lama Sewa</th>
                            <th>Tarif</th>
                            <th>Total Tarif</th>            
                            <th>Opsi</th>    
                        </tr>
                       

                    </thead>
                    <tbody>
                    <?php foreach($data as $row){ ?>
                        <tr>        
                            <td><?php echo $row['Nama_Penghuni'] ?></td>
                            <td><?php echo $row['Jenis_Kost'] ?></td>                    
                            <td><?php echo $row['Lama_Menyewa'] ?></td>
                            <td><?php echo $row['Tarif'] ?></td>
                            <td><?php echo $row['Total_Tarif'] ?></td>
                            <td>
                                <a href="">Edit</a> | 
                                <a href="">Delete</a>
                            </td>                    
                        </tr>
                        
                    <?php } ?>  
                    </tbody>
                    </table>
                </div><!-- endbody -->
                <div class="subFooter"></div>     
            <div class="footer"><p>Copyright WAN</p></div>       

            <!-- BUTTON -->
            <div class="button">
                <ul>
                    <li><a href="insert.php">Add Data</a></li>
                    <li><a href="">Log out</a></li>
                </ul>
            </div>

        </div> <!-- endRow -->                
    </div><!-- endContainer -->





            <tbody>


                    
                </tbody>    
            </table>
        

    </body>
</html>