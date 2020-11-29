<?php
include "../koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM slta WHERE id = $id";
mysqli_query($conn, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
?>