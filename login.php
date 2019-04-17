
<body><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>    
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    
</head>
<body>   
    <div class="container">
        <div class="row">
        <div class="header"></div>
        
        <div class="form">
        <h1>LOGIN</h1>
            <?php
                if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "Invalid username or password";
                }else if($_GET['pesan'] == "logout"){
                    echo "You're log out";
                }else if($_GET['pesan'] == "belumLogin"){
                    echo "silahkan login dahulu";
                }
            }
            ?>
            
            <form method="post" action="cekLogin.php">
                    <div class="form-input">
                        <input type="text" name="username" placeholder="username">
                    </div>
                    <div class="form-input">
                    <input type="password" name="password" placeholder="password"	
                    </div>	

                <input type="submit" name="submit" value="LOGIN" class="btn-login">	
            </form> <br>
        </div>
          
        
        <div class="footer"></div>
        </div>
    </div>    

    
</body>
</html>