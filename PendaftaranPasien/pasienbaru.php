<?php

$server ="localhost";
$user ="root";
$password ="";
$nama_database ="pendaftaran_pasien";
$db = mysqli_connect($server,$user,$password,$nama_database);

$sql = "SELECT MAX(id) FROM pasien ";
$query = mysqli_query($db, $sql);
if ($data = mysqli_fetch_array($query)){
    $id = $data[0]+1;
}

echo "
<head>
<title>DAFTAR PASIEN BARU</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <center><br>
    <form action='' method='POST'>
    <table cellpadding=5 border=2 frame='void' style='background-color:#F2F2F2'>
    <tr><td><center><h2 class='judul'>DAFTAR PASIEN BARU</h2>
    <table>
    <tr><td colspan=2><hr></td></tr>
    
    <tr><td><b>ID Pasien</td> <td><b>: $id</td></tr> 
    <tr><td><b>Nama lengkap</td> <td><b>: <input type='text' name='nm'></td></tr> 
    <tr><td><b>Tgl Lahir </td><td><b>: <input type='text' name='tl'></td></tr>
    <tr><td><b>Jenis Kelamin </td><td><b>:  
    <input type='radio' name='jk' value='L'> Laki-laki
    <input type='radio' name='jk' value='P'> Perempuan
    </td></tr>
    <tr><td><b>Alamat </td><td><b>: <input type='text' name='al'></td></tr>
    <tr><td><b>No Telp </td> <td><b>: <input type='text' name='nt'></td></tr> 
    <tr><td colspan=2><hr></td></tr>
    <tr><td><input type='Submit' name='Daftar' value='Daftar'></td>
    <td align='right'><a class='text' href='antrian.php'><b>Kembali</a></td></tr>
    </table>
    </td></tr>
    </table>
</form>

";

if (isset($_POST['Daftar'])){
    $nm = $_POST['nm'];
    $tl = $_POST['tl'];
    $jk = $_POST['jk'];
    $al = $_POST['al'];
    $nt = $_POST['nt'];
    
    $sql = "INSERT INTO 
    pasien (id, nama, tgl_lahir, jenis_kelamin, alamat, no_telp) 
    VALUES ('$id', '$nm', '$tl', '$jk', '$al', '$nt')";
    $query = mysqli_query($db, $sql);
    
        echo "<form action='antrianbaru.php' method='POST'>
        <table cellpadding=5 border=2 style='background-color:#F2F2F2'><tr>
        <td><center><b>ID</td>
        <td><center><b>Nama Lengkap</td>
        <td><center><b>Tgl. Lahir</td>
        <td><center><b>Jenis Kelamin</td>
        <td><center><b>Alamat</td>
        <td><center><b>No. Telepon</td>
        </tr><tr>";
        echo "<td>$id</td>";
        echo "<td>$nm</td>";
        echo "<td>$tl</td>";
        echo "<td>$jk</td>";
        echo "<td>$al</td>";
        echo "<td>$nt</td>";
        echo "<td>
        <input type='hidden' name='id' value='$id'>
        <input type='Submit' name='Antri' value='Antri'>
        </td></tr></form>";
}
echo "";

?>