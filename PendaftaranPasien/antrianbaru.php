<?php
if (isset($_POST['Antri'])){ 
$id = $_POST['id'];

$server ="localhost";
$user ="root";
$password ="";
$nama_database ="pendaftaran_pasien";
$db = mysqli_connect($server,$user,$password,$nama_database);
if($db){
    //generate no antrian baru
    $tgl = date("Y-m-d");
    $sql = "SELECT MAX(no_antrian) FROM antrian WHERE tgl_periksa = '$tgl'";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($query);
    $no_antrian = $data[0]+1;
    
    //insert data antrian baru ke table antrian
    $id_dokter = '3';
    $sql = "INSERT INTO 
    antrian (id, id_pasien, id_dokter, tgl_periksa, no_antrian, status) 
    VALUES (NULL, '$id', '$id_dokter', '$tgl', '$no_antrian', 'tunggu')
    ";
    $query = mysqli_query($db, $sql);
    header("location:antrian.php");
    }
}
?>