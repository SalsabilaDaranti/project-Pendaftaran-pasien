<?php
$idb = $_POST['id'];
$server ="localhost";
$user ="root";
$password ="";
$nama_database ="pendaftaran_pasien";
$db = mysqli_connect($server,$user,$password,$nama_database);

if($db){
    //update status dari tunggu menjadi periksa
    if (isset($_POST['Berikutnya'])){
        $sql = "UPDATE antrian SET status = 'periksa' WHERE id = $idb";
        $query = mysqli_query($db, $sql);
        header("location:antrian.php");
    }
    //update status dari tunggu menjadi periksa
    if (isset($_POST['Lewat'])){
        $sql = "UPDATE antrian SET status = 'Lewat' WHERE id = $idb";
        $query = mysqli_query($db, $sql);
        header("location:antrian.php");
    }

}
?>