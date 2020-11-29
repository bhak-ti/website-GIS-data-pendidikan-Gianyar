<?php
session_start();
error_reporting(0);
include "../koneksi.php";
if(!isset($_SESSION['id'])){
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>

       <title>Edit</title>
</head>
<body class="bg-light">
<h1 align="center"> Edit Data Penduduk</h1>
<?php

$id = $_GET['id'];
$b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM guru where kode_dagri='$id'"));

$kecamatan= mysqli_real_escape_string($conn, $_POST['kecamatan']);     
$kodedagri= mysqli_real_escape_string($conn, $_POST['kode_dagri']);    
$jml= mysqli_real_escape_string($conn, $_POST['jumlah_guru']); 


if(isset($_POST['simpan'])){
 if(empty($jml)){    
        $error="<p style='color:#F00;'>* Masukan Jumlah Penduduk</p>";
    }
    
    else{  
        // var_dump($kecamatan,$kodedagri,$jml);
    $save=mysqli_query($conn, "UPDATE guru SET kecamatan='$kecamatan',kode_dagri='$kodedagri',jumlah_guru='$jml' where kode_dagri='$kodedagri'");
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
        <td>Kecamatan</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="kecamatan" placeholder="kecamatan" readonly size="50" maxlength="30" autocomplete="off" autofocus value="<?php echo $b['kecamatan'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Kode Dagri</td>
        <td>:</td>
        <td><input class="form-control" type="text" name="kode_dagri" placeholder="kodedagri" readonly size="50" maxlength="30" autocomplete="off" autofocus value="<?php echo $b['kode_dagri'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Jumlah Penduduk</td>
        <td>:</td>
        <td><input class="form-control" type="number" name="jumlah_guru" placeholder="jml" autocomplete="off" autofocus value="<?php echo $b['jumlah_guru'];?>"/>
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