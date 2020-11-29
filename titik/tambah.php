<?php
session_start();
error_reporting(0);
include "../koneksi.php";
if(!isset($_SESSION['id'])){
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>

       <title>Tambah</title>
</head>
<body class="bg-light">
<h1 align="center"> Tambah Data</h1>
<?php

$npsn=$_POST['npsn'];
$nm=$_POST['nm'];
$alamat=$_POST['alamat'];
$kecamatan=$_POST['kecamatan'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];



if(isset($_POST['simpan'])){
 if(empty($npsn) || empty($nm) || empty($alamat) || empty($kecamatan) || empty($lat) || empty($lng)){    
        $error="<p style='color:#F00;'>* data tidak boleh kosng</p>";
    }
    
    else{  

    $save=mysqli_query($conn, "INSERT INTO slta (npsn, nm_skl, alamat, kecamatan, lat, lng) VALUES ('$npsn','$nm', '$alamat', '$kecamatan','$lat','$lng')");
    if($save){ 
        echo "<script>alert('Data  Berhasil disimpan ke database');document.location='../index.php'</script>";
    }else{ 
         echo "<script>alert('Proses simpan gagal, coba kembali');document.location='edit.php'</script>";
    }
}
}
?>
<form class="mt-5" action="" method="post" enctype="multipart/form-data">
    <table  border="0" cellpadding="10" cellspacing="10" width="800" align="center">
    <tbody>
    <tr><td colspan="3"><?php echo $error;?></td></tr>
    <tr>
        <td>NPSN</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="npsn" placeholder="NPSN"  size="50" maxlength="30" autocomplete="off" autofocus />
        </td>
    </tr>
    <tr>
        <td>NAMA SEKOLAH</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="nm" placeholder="Nama Sekolah"  size="50" maxlength="30" autocomplete="off" autofocus />
        </td>
    </tr>
    <tr>
        <td>ALAMAT</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="alamat" placeholder="Alamat"  size="50" maxlength="30" autocomplete="off" autofocus />
        </td>
    </tr>
    <tr>
        <td>KECAMATAN</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="kecamatan" placeholder="Kecamatan"  size="50" maxlength="30" autocomplete="off" autofocus />
        </td>
    </tr>
    <tr>
        <td>LONGITUDE</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="lng" placeholder="Longitude"  size="50" maxlength="30" autocomplete="off" autofocus />
        </td>
    </tr>
    <tr>
        <td>LATITUDE</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="lat" placeholder="Latitude" autocomplete="off" autofocus />
        </td>
    </tr>
    
    <tr>
        <td colspan="3">
            <button class="btn btn-info btn-sm mt-5 "  type="submit" name="simpan" onclick="return confirm('Anda yakin ingin menyimpan data?')">Simpan</button>
           <a href="../index.php" class="btn btn-danger btn-sm mt-5 ml-2">Kembali</a>
        </td>
    </tr>
    </tbody>

</table>
</form>

</body>
</html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>