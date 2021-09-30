<?php
    //tgl sekarang    
    $tgl = date("Y-m-d");

    $server ="localhost";
    $user ="root";
    $password ="";
    $nama_database ="pendaftaran_pasien";
    $db = mysqli_connect($server,$user,$password,$nama_database);

    echo "
<head>
<title>ANTRIAN</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <table width=100% height=90% valign=middle>
    <tr><td>
    <center>

    <table cellpadding=5 border=1 frame='void' style='background-color:#F2F2F2'><tr><td>
    <table>
    <tr><td colspan=2><b>$tgl</td></tr>
    <tr><td colspan=2><hr></td></tr>
    ";
    if($db){
        //query jumlah antrian hari ini  
        $sql = "SELECT COUNT(id) FROM antrian WHERE tgl_periksa = '$tgl'";
        $query = mysqli_query($db, $sql);
        if ($data = mysqli_fetch_array($query)){
        echo "<tr><td><b>Jumlah Antrian Hari ini </td><td><b>: ".$data[0]."</td></tr>";
        }   
        //query no antrian yg sedang terlewat
        $sql = "SELECT COUNT(no_antrian) FROM antrian 
        WHERE tgl_periksa = '$tgl' AND status = 'lewat'";
        $query = mysqli_query($db, $sql);
        if ($data = mysqli_fetch_array($query)){
            echo "<tr><td><b>Antrian terlewat </td><td><b>: ".$data[0]."</td></tr>";
        }
        //query no antrian yg sedang diperiksa
        $sql = "SELECT MAX(no_antrian) 
        FROM antrian WHERE tgl_periksa = '$tgl' AND  status = 'periksa'";
        $query = mysqli_query($db, $sql);
        if ($data = mysqli_fetch_array($query)){
        $no = $data[0];
        echo "<tr><td><b>No Antrian sedang diperiksa </td><td><b>: ".$data[0]."</td></tr>";
        }      
        //query no antrian yg sedang menunggu
        $sql = "SELECT id, no_antrian, COUNT(no_antrian) FROM antrian 
        WHERE tgl_periksa = '$tgl' AND status = 'tunggu'";
        $query = mysqli_query($db, $sql);
        if ($data = mysqli_fetch_array($query)){
        $id=$data[0];
        echo "<tr><td><b>Antrian yang tersisa </td><td><b>: ".$data[2]."</td></tr>";
        echo "<tr><td><b>No Antrian Berikutnya </td><td><b>: ".$data[1]."</td></tr>";
        }   
    }
    echo "
    <tr><td colspan=2><a class='text' href='caripasien.php'><b>Antrian Baru</a></td></tr>
    <tr><td colspan=2><hr></td><tr>";
    //update status no antrian berikut nya dari tunggu menjadi periksa
    echo "
    <form action='update.php' method='POST'>
    <tr>
    <td><input type='hidden' name='id' value='$id'>
    <input type='Submit' name='Berikutnya' value='Berikutnya'>
    </td></form>";
    //update status no antrian berikut nya dari tunggu menjadi lewat
    echo "
    <form action='update.php' method='POST'>
    <td><input type='hidden' name='id' value='$id'>
    <input type='Submit' name='Lewat' value='Lewat'>
    </td>
    </tr></form>";
    echo "</table>
    </td><td width=300 align=center><br><h1 class='no'>$no</td></tr></table>
    </td></tr></table>";
?>