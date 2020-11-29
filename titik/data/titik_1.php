<?php
include '../../koneksi.php';
$hasil = mysqli_query($conn, 'SELECT * FROM slta WHERE lng > 0');
?>

var json_titik_1 = {
  "type": "FeatureCollection",
  "name": "titik_1",
  "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
  "features": [
    <?php 
      
      while ($data = mysqli_fetch_array($hasil)) {
        $id = $data['id'];
        $npsn = $data['npsn'];
        $nm_skl = $data['nm_skl'];
        $alamat = $data['alamat'];
        $kecamatan = $data['kecamatan'];
        $lat = $data['lat'];
        $lng = $data['lng'];
        ?>
{ "type": "Feature", "properties": { "NPSN": <?= $npsn ?>, "NAMA SEKOLAH": "<?= $nm_skl ?>", "ALAMAT": "<?= $alamat ?>", "KECAMATAN": "<?= $kecamatan ?>", "X": <?= $lng ?>, "Y": <?= $lat ?> }, "geometry": { "type": "Point", "coordinates": [ <?= $lng ?>, <?= $lat ?> ] } },  
        <?php
      }
    ?>
  ]
}

