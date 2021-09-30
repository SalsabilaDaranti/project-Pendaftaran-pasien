<?php

$server ="localhost";
$user ="root";
$password ="";
$nama_database ="pendaftaran_pasien";
$db = mysqli_connect($server,$user,$password,$nama_database);

echo "
<head>
<title>CARI PASIEN</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <center><br><br>
    <form action='' method='POST'>
    <table cellpadding=5 border=2 frame='void' style='background-color:#F2F2F2'>
    <tr><td><center><h2 class='judul'>CARI PASIEN</h2>
    <table>
    <tr><td colspan=2><hr></td></tr>
    <tr><td><b>Nama </td> <td><b>: <input type='text' name='nm'></td></tr> 
    <tr><td><b>Jenis Kelamin </td><td><b>:  
    <input type='radio' name='jk' value='L'> Laki-laki
    <input type='radio' name='jk' value='P'> Perempuan
    </td></tr>
    <tr><td colspan=2><hr></td></tr>
    <tr><td><input type='Submit' name='Cari' value='Cari'></td>
    <td><a class='text' href='pasienbaru.php'><b>Daftar Pasien Baru</a><br></td>
    </tr>
    </table>
    </td></tr>
    </table>
</form>
";

if (isset($_POST['Cari'])){
    $nm = $_POST['nm'];
    $jk = $_POST['jk'];
    
    $sql = "SELECT * FROM pasien WHERE
    nama LIKE '%$nm%' AND
    jenis_kelamin = '$jk'
    ";
    $query = mysqli_query($db, $sql);
    echo "<table cellpadding=5 border=2 style='background-color:#F2F2F2'><tr>
    <td><center><b>ID</td>
    <td><center><b>Nama Lengkap</td>
    <td><center><b>Tgl. Lahir</td>
    <td><center><b>Jenis Kelamin</td>
    <td><center><b>Alamat</td>
    <td><center><b>No. Telepon</td>
    </tr>";
    while ($data = mysqli_fetch_array($query)){
        echo "<form action='antrianbaru.php' method='POST'>
        <tr>";
        echo "<td>".$data[0]."</td>";
        echo "<td>".$data[1]."</td>";
        echo "<td>".$data[2]."</td>";
        echo "<td>".$data[3]."</td>";
        echo "<td>".$data[4]."</td>";
        echo "<td>".$data[5]."</td>";
        echo "<td>
        <input type='hidden' name='id' value='".$data[0]."'>
        <input type='Submit' name='Antri' value='Antri'>
        </td></tr></form>";
        }   
}
echo "</table>";
echo "";
?>