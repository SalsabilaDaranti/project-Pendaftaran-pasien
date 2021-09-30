<?php

class index
{
    public function __construct(){
    }

    public function login(){
//form login
echo "
<head>
<title>Login</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <table width=100% height=90% valign=middle>
    <tr><td>
    <center>
    <form action='' method='POST'>
    
    <table border=2 frame='void' style='background-color:white'>
    <tr><td>
    <table>
    <tr><td colspan=2><center><h2 class='judul'>KLINIK LOGIN</h2></td></tr>
    <tr><td colspan=2><hr></td><tr>
    <tr><td rowspan=4><img src='img/images.jpg'></td>
    <td><table>
    <tr><td>User Name </td> <td>: <input type='text' name='us'></td></tr> 
    <tr><td>Password </td><td>: <input type='password' name='ps'></td></tr>
    <tr><td><input type='Submit' name='Masuk' value='Masuk'></td></tr>
    </table></td></tr>
    </table>
    </td></tr>
    </table>
</form>
</td></tr></table>
</body>
";
    }

    public function beranda($us){
    //form beranda
    echo "
    <head>
    <title>Beranda</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    </head>
    <body>
    <table width=100% height=90% valign=middle>
    <tr><td>
    <center>
    
    <table border=2 frame='void' style='background-color:#F2F2F2'>
    <tr><td>
    <table cellpadding=5>
    <tr><td colspan=2>
    <h2 class='judul'><b>Selamat Datang di Beranda $us</h2>
    </td></tr>
    <tr><td>
    <a href='caripasien.php'>
    <img src='img/pasien1.png' width='400' height='225'><br>
    PASIEN</a>
    </td><td>
    <a href='antrian.php'>
    <img src='img/antrian2.jpg' width='400' height='225'><br>
    ANTRIAN</a>
    </td></tr></table>
    </td></tr></table>
    </td></tr></table>
    ";
    }

    public function __destruct(){
    }
}

$proses = new index();
$us =@$_POST['us'];
$ps =@$_POST['ps'];
    
    $server ="localhost";
    $user ="root";
    $password ="";
    $nama_database ="pendaftaran_pasien";
    
    $db = mysqli_connect($server,$user,$password,$nama_database);
    
    if($db){
        $sql = "SELECT * FROM login WHERE nama LIKE '$us' AND password = '$ps' ";
        $query = mysqli_query($db, $sql);
    
        if ($data = mysqli_fetch_array($query)){
            $proses->beranda($us);    
        }else {
            $proses->login();
            if (($us != "") OR ($ps !="")){
                echo "<center>
                <table  border=2 frame='void' style='background-color:#F2F2F2'>
                <tr><td>
                <h2 class='text'>User name dan/atau Password salah. Silahkan coba kembali.</h2>
                </td></tr>
                </table>";
            }
        }   
    }

?>