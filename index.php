<?php 
    session_start();
  include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Dinas Pendidikan Kab. Gianyar</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo_icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    
    
    <link rel="stylesheet" href="peta_gianyar/resources/ol.css">
       <link rel="stylesheet" href="peta_gianyar/resources/ol3-layerswitcher.css">
    <link rel="stylesheet" href="peta_gianyar/resources/qgis2web.css">
    
    <link rel="stylesheet" href="titik/css/leaflet.css">
        <link rel="stylesheet" href="titik/css/qgis2web.css">
        <link rel="stylesheet" href="titik/css/leaflet-measure.css">
        <style>
        html, body, #map2 {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        </style>

<style>
.tooltip {
  position: relative;
  background: rgba(0, 0, 0, 0.5);
  border-radius: 4px;
  color: white;
  padding: 4px 8px;
  opacity: 0.7;
  white-space: nowrap;
}
.tooltip-measure {
  opacity: 1;
  font-weight: bold;
}
.tooltip-static {
  background-color: #ffcc33;
  color: black;
  border: 1px solid white;
}
.tooltip-measure:before,
.tooltip-static:before {
  border-top: 6px solid rgba(0, 0, 0, 0.5);
  border-right: 6px solid transparent;
  border-left: 6px solid transparent;
  content: "";
  position: absolute;
  bottom: -6px;
  margin-left: -7px;
  left: 50%;
}
.tooltip-static:before {
  border-top-color: #ffcc33;
}
.measure-control {
  top: 65px;
  left: .5em;
}
.ol-touch .measure-control {
  top: 80px;
}
</style>
        <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        </style>
   

</head>
<body id="page-top" class="politics_version">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->
	
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
			<img class="img-fluid" src="images/logo1.png" alt="" />
		</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger active" href="#home">Beranda</a>
            </li>
            <li class="nav-item">
            <div class="dropdown">
         <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Peta
        </a>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#peta">Peta Sebaran</a>
    <a class="dropdown-item" href="#peta_titik">Peta Titik</a>
         </div>
        </div>
        <li class="nav-item">
            <div class="dropdown">
         <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Tabel
        </a>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#tabel_sekolah">Tabel Sekolah</a>
    <a class="dropdown-item" href="#tabel_guru">Tabel Guru</a>
         </div>
        </div>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#gallery">Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#pegawai">Pegawai</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Tentang</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Pengaduan</a>
            </li>
            <li class="nav-item">
                <?php
                    if(isset($_SESSION['id'])){
                        ?>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Admin
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
                        <?php
                      } else {
                          ?>
                            <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
                          <?php
                      }
                ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	<div id="home" class="ct-header ct-header--slider ct-slick-custom-dots">
		<div class="ct-slick-homepage" data-arrows="true" data-autoplay="false">

			<div class="ct-header tablex item" data-background="images/slider3.jpg">
				<div class="ct-u-display-tablex">
					<div class="inner">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-lg-8 slider-inner">
									<h1 class="big animated">Selamat Datang Dinas Pendidikan Gianyar</h1>
									<p class="animated">Dharmo Raksa Raraksita.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="ct-header tablex item" data-background="images/slider1.jpg">
				<div class="ct-u-display-tablex">
					<div class="inner">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-lg-8 slider-inner">
									<h1 class="big animated">Nadiem Makarim</h1>
									<p class="animated">Menteri Pendidikan Indonesia</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="ct-header tablex item" data-background="images/slider2.jpg">
				<div class="ct-u-display-tablex">
					<div class="inner">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-lg-8 slider-inner">
									<h1 class="big animated">I Made Agus Mahayastra</h1>
									<p class="animated">Bupati Kabupaten Gianyar</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div><!-- .ct-slick-homepage -->
	</div><!-- .ct-header --> 
	
    <div id="peta" class="section lb">
        <div>
            <div class="section-title text-center">
                <h3>Peta Sebaran Guru </h3>
                <p>Peta Sebaran Guru SLTA kab. GIanyar</p>
            </div>
            <div id="map">
            <div id="popup" class="ol-popup">
                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                <div id="popup-content"></div>
            </div>
        </div>
        
        
		</div>
    </div>
    
    <div id="peta_titik" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Peta Titik </h3>
                <p>Peta Titik lokasi Sekolah Tingkat SLTA di Kab. Gianyar</p>
            </div>

        </div>
    </div>

        
            <div id="map2">
            </div>
        



	<div id="tabel_sekolah" class="section lb">
		<div class="container">
			<div class="section-title text-center">
                <h3>Tabel Data</h3>
                <p><h4>Titik Lokasi Sekolah</h4></p>
                <table class="table table-bordered table-striped"	>
       <thead>
       <tr>
           <th><h4>NPSN</h4></th>
           <th><h4>NAMA SEKOLAH</h4></th>
           <th><h4>ALAMAT</h4></th>
           <th><h4>KECAMATAN</h4></th>
           <?php 
            if(isset($_SESSION['id'])){

            ?>
                 <th><h4>OPSI</h4></th>
            <?php
            }
        ?>
           
       </tr>
       </thead>

       <tbody>

<?php
$ambil = $conn->query("SELECT * FROM slta"  );
while($a=mysqli_fetch_array($ambil)){
    ?>
       <tr>
           <td><?php echo $a['npsn'];?></td>
           <td><?php echo $a['nm_skl'];?></td>
           <td><?php echo $a['alamat'];?></td>
           <td><?php echo $a['kecamatan'];?></td>
           
          
        <?php 
            if(isset($_SESSION['id'])){

            ?>
             <td>
                 <a href="titik/hapus.php?id=<?= $a['id'] ?>" class="btn btn-info btn-sm">hapus</a>
            </td>
            <?php
            }
        ?>
      
       </tr>
<?php
}
?>
</tbody>
</table>
<?php 
            if(isset($_SESSION['id'])){

            ?>
             <td>
                 <a href="titik/tambah.php" class="btn btn-info btn-sm">tambah</a>
            </td>
            <?php
            }
        ?>
           </div>
		</div>
     </div>
     
     


     <div id="tabel_guru" class="section lb">
		<div class="container">
			<div class="section-title text-center">
                <h3>Tabel Data</h3>
                <p><h4>Jumlah Guru SLTA</h4></p>
                <table class="table table-bordered table-striped"	>
       <thead>
       <tr>
           <th><h4>Kecamatan</h4></th>
           <th><h4>Kode Dagri</h4></th>
           <th><h4>Jumlah Guru (SLTA)</h4></th>
           <?php 
            if(isset($_SESSION['id'])){

            ?>
                 <th><h4>OPSI</h4></th>
            <?php
            }
        ?>
           
       </tr>
       </thead>

       <tbody>

<?php
$ambil = $conn->query("SELECT * FROM guru"  );
while($a=mysqli_fetch_array($ambil)){
    ?>
       <tr>
           <td><?php echo $a['kecamatan'];?></td>
           <td><?php echo $a['kode_dagri'];?></td>
           <td><?php echo $a['jumlah_guru'];?></td>
          
        <?php 
            if(isset($_SESSION['id'])){

            ?>
             <td>
                 <a href="peta_gianyar/edit.php?id=<?php echo $a['kode_dagri'];?>" class="btn btn-info btn-sm">Edit</a>
            </td>
            <?php
            }
        ?>
      
       </tr>
<?php
}
?>
</tbody>
</table>
           </div>
		</div>
 	</div>


	<div id="gallery" class="section lb">
		<div class="container">
			<div class="section-title text-center">
                <h3>Galeri</h3>
                <p>Foto dokumentasi kegiatan</p>
            </div><!-- end title -->
			
			<div class="gallery-menu text-center row">
				<div class="col-md-12">
					
				</div>
			</div>
			
			<div class="gallery-list row">
				<div class="col-md-4 col-sm-6 gallery-grid gal_a gal_b">
					<div class="gallery-single spi-hr fix hover">
						<img src="images/foto1.jpg" class="img-fluid" alt="Image">
							<div class="img-overlay">
							<a href="images/foto1.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
		/		</div>
				
				<div class="col-md-4 col-sm-6 gallery-grid gal_c gal_b">
					<div class="gallery-single spi-hr fix">
						<img src="images/foto2.jpg" class="img-fluid" alt="Image">
							<div class="img-overlay">
							<a href="images/foto2.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6 gallery-grid gal_a gal_c">
					<div class="gallery-single spi-hr fix">
						<img src="images/foto3.jpg" class="img-fluid" alt="Image">
							<div class="img-overlay">
							<a href="images/foto3.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6 gallery-grid gal_b gal_a">
					<div class="gallery-single spi-hr fix">
						<img src="images/foto4.jpg" class="img-fluid" alt="Image">
							<div class="img-overlay">
							<a href="images/foto4.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6 gallery-grid gal_a gal_c">
					<div class="gallery-single spi-hr fix">
						<img src="images/foto5.jpg" class="img-fluid" alt="Image">
							<div class="img-overlay">
							<a href="images/foto5.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6 gallery-grid gal_c gal_a">
					<div class="gallery-single spi-hr fix">
						<img src="images/foto6.jpg" class="img-fluid" alt="Image">
							<div class="img-overlay">
							<a href="images/foto6.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	 <div id="pegawai" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Pegawai</h3>
                <p>Daftar Pegawai</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3> Kepala Dinas </h3>
                                <p class="lead">NIP : 000000001</p>
								<i class="fa fa-quote-right"></i>
                            </div>
                            <div class="testi-meta">
                                <img src="images/fp.png" alt="" class="img-fluid">
                                <h4>Bhakti</h4>
                            </div>
                        </div>
                        

                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3> Sekretaris 1 </h3>
                                <p class="lead">NIP : 000000002</p>
								<i class="fa fa-quote-right"></i>
                            </div>
                            <div class="testi-meta">
                                <img src="images/fp.png"" alt="" class="img-fluid">
                                <h4>Jesica Ahmad </h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3> Sekretaris 2 </h3>
                                <p class="lead">NIP : 000000003</p>
								<i class="fa fa-quote-right"></i>
                            </div>
                            <div class="testi-meta">
                                <img src="images/fp.png"" alt="" class="img-fluid">
                                <h4>Yulita Riska </h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        < <div class="testimonial clearfix">
                            <div class="desc">
                                <h3> Bendahara 1 </h3>
                                <p class="lead">NIP : 000000004</p>
								<i class="fa fa-quote-right"></i>
                            </div>
                            <div class="testi-meta">
                                <img src="images/fp.png"" alt="" class="img-fluid">
                                <h4>Wendy Raharjo</h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->


                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3> Bendahara 2 </h3>
                                <p class="lead">NIP : 000000005</p>
								<i class="fa fa-quote-right"></i>
                            </div>
                            <div class="testi-meta">
                                <img src="images/fp.png"" alt="" class="img-fluid">
                                <h4>Amelia Rudi</h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->


                        <div class="testimonial clearfix">
                            <div class="desc">
                                <h3> Staff </h3>
                                <p class="lead">NIP : 000000006</p>
								<i class="fa fa-quote-right"></i>
                            </div>
                            <div class="testi-meta">
                                <img src="images/fp.png"" alt="" class="img-fluid">
                                <h4>Helmi Dwi </h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	<div id="about" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">                        
                        <h2>Dinas Pendidikan Kabupaten Gianyar</h2>
                        <h3>Jl. Erlangga No.1, Gianyar, Kec. Gianyar, Kabupaten Gianyar, Bali 80511</h3>
                        <h2>Visi Dinas Pendidikan Kabupaten Gianyar</h2>
                        <p>Terwujudnya masyarakat Gianyar yang Bahagia, Sejahtera, Aman dan Damai, Mandiri, Berintegritas Berlandaskan Tri Hita Karana melalui Pola Pembangunan Nasional Semesta Berencana. </p>
                        <h2>Misi Dinas Pendidikan Kabupaten Gianyar</h2>
                        <p>1. Mewujudkan akses pendidikan yang meluas, merata dan berkeadilan serta mewujudkan  peserta didik yang berintegritas dan berdaya saing.</p>
                        <p>2. Menata sistem manajemen dan mutu pendidikan dengan pengembangan potensi peserta didik yang berkarakter.</p> 
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="right-box-pro wow fadeIn">
						<img src="images/logo.png" alt="" class="img-fluid img-rounded fat-ab">
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
			
			

    <div id="contact" class="section db">
        <div class="container">
            <div class="section-title text-center">
                <h3>Pengaduan</h3>
                <p>Kirim pengaduan anda</p>
            </div><!-- end title -->

<?php
if(isset($_POST['kirim'])){
$nama= mysqli_real_escape_string($conn, $_POST['nama']);    
$email= mysqli_real_escape_string($conn, $_POST['email']);   
$pesan= mysqli_real_escape_string($conn, $_POST['pesan']);
$no_hp= mysqli_real_escape_string($conn, $_POST['hp']);
var_dump($nama);
 if(!empty($nama) && !empty($email) && !empty($pesan) && !empty($no_hp)){ 
      $save=mysqli_query($conn, "INSERT INTO pengaduan (nama,email,pesan,no_hp) VALUES ('$nama','$email','$pesan','$no_hp')");
    if($save){ 
        echo "<script>alert('aduan terkirim');document.location='index.php'</script>";
    }else{ 
         echo "<script>alert('aduan gagal');document.location='index.php'	</script>";
    }
       }
    
}
 ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" name="nama" id="name" type="text" placeholder="Nama Anda" required="required" data-validation-required-message="Mohon masukkan nama anda.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" name="email" id="email" type="email" placeholder="Email Anda" required="required" data-validation-required-message="Mohon masukkan email anda.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" name="hp" id="hp" type="tel" placeholder="No Hp Anda" required="required" data-validation-required-message="Masukkan no hp anda">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea class="form-control" name="pesan" id="message" placeholder="Aduan" required="required" data-validation-required-message="mohon masukkan pesan anda"></textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<button  class="sim-btn btn-new from-middle animated" data-text="Kirim Aduan" type="submit" name="kirim" onclick="return confirm('Anda yakin ingin mengirim aduan?')">Kirim Aduan</button>
								</div>
							</div>
						</form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-company-name">All Rights Reserved. &copy; 2019 <a href="#">Dukcapil Bangli</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<!-- Camera Slider -->
	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script> 
	<script src="js/parallaxie.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/animated-slider.js"></script>
	<!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

    <script src="peta_gianyar/resources/qgis2web_expressions.js"></script>
        <script src="peta_gianyar/resources/polyfills.js"></script>
        <script src="peta_gianyar/resources/functions.js"></script>
        <script src="peta_gianyar/resources/ol.js"></script>
        <script src="peta_gianyar/resources/ol3-layerswitcher.js"></script>
        <script src="peta_gianyar/layers/guru.php"></script>
        <script src="peta_gianyar/styles/ADMINISTRASIKECAMATAN_AR_0_style.js"></script>
        <script src="peta_gianyar/layers/layers.js" type="text/javascript"></script> 
        <script src="peta_gianyar/resources/qgis2web.js"></script>
        <script src="peta_gianyar/resources/Autolinker.min.js"></script>


    <script src="titik/js/qgis2web_expressions.js"></script>
        <script src="titik/js/leaflet.js"></script>
        <script src="titik/js/leaflet.rotatedMarker.js"></script>
        <script src="titik/js/leaflet.pattern.js"></script>
        <script src="titik/js/leaflet-hash.js"></script>
        <script src="titik/js/Autolinker.min.js"></script>
        <script src="titik/js/rbush.min.js"></script>
        <script src="titik/js/labelgun.min.js"></script>
        <script src="titik/js/labels.js"></script>
        <script src="titik/js/leaflet-measure.js"></script>
        <script src="titik/data/ADMINISTRASIKECAMATAN_AR_0.js"></script>
        <script src="titik/data/titik_1.php"></script>
        <script>
            
        var map = L.map('map2', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[-8.65054302414,114.956763239],[-8.29757146254,115.622780071]]);
        var hash = new L.Hash(map);
        map.attributionControl.addAttribution('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a>');
        L.ImageOverlay.include({
            getBounds: function(){
                return this._bounds;
            }
        });
        console.log({L})
        var measureControl = new L.Control.Measure({
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: 'kilometers',
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: 'hectares'
        });
        measureControl.addTo(map);
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }
        function pop_ADMINISTRASIKECAMATAN_AR_0(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['KECAMATAN'] !== null ? Autolinker.link(String(feature.properties['KECAMATAN'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_ADMINISTRASIKECAMATAN_AR_0_0(feature) {
            switch(String(feature.properties['KECAMATAN'])) {
                case 'Blahbatuh':
                    return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(123,178,237,1.0)',
            }
                    break;
                case 'Gianyar':
                    return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(126,232,208,1.0)',
            }
                    break;
                case 'Payangan':
                    return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(220,74,108,1.0)',
            }
                    break;
                case 'Sukawati':
                    return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(219,133,40,1.0)',
            }
                    break;
                case 'Tampaksiring':
                    return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(111,235,114,1.0)',
            }
                    break;
                case 'Tegalallang':
                    return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(118,82,217,1.0)',
            }
                    break;
                case 'Ubud':
                    return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(214,16,211,1.0)',
            }
                    break;
                default:
                    return {
                pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(203,227,136,1.0)',
            }
                    break;
            }
        }
        map.createPane('pane_ADMINISTRASIKECAMATAN_AR_0');
        map.getPane('pane_ADMINISTRASIKECAMATAN_AR_0').style.zIndex = 400;
        map.getPane('pane_ADMINISTRASIKECAMATAN_AR_0').style['mix-blend-mode'] = 'normal';
        var layer_ADMINISTRASIKECAMATAN_AR_0 = new L.geoJson(json_ADMINISTRASIKECAMATAN_AR_0, {
            attribution: '<a href=""></a>',
            pane: 'pane_ADMINISTRASIKECAMATAN_AR_0',
            onEachFeature: pop_ADMINISTRASIKECAMATAN_AR_0,
            style: style_ADMINISTRASIKECAMATAN_AR_0_0,
        });
        bounds_group.addLayer(layer_ADMINISTRASIKECAMATAN_AR_0);
        map.addLayer(layer_ADMINISTRASIKECAMATAN_AR_0);
        function pop_titik_1(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">NPSN</th>\
                        <td>' + (feature.properties['NPSN'] !== null ? Autolinker.link(String(feature.properties['NPSN'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">NAMA SEKOLAH</th>\
                        <td>' + (feature.properties['NAMA SEKOLAH'] !== null ? Autolinker.link(String(feature.properties['NAMA SEKOLAH'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">ALAMAT</th>\
                        <td>' + (feature.properties['ALAMAT'] !== null ? Autolinker.link(String(feature.properties['ALAMAT'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KECAMATAN</th>\
                        <td>' + (feature.properties['KECAMATAN'] !== null ? Autolinker.link(String(feature.properties['KECAMATAN'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['X'] !== null ? Autolinker.link(String(feature.properties['X'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Y'] !== null ? Autolinker.link(String(feature.properties['Y'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_titik_1_0() {
            return {
                pane: 'pane_titik_1',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(28,56,180,1.0)',
            }
        }
        map.createPane('pane_titik_1');
        map.getPane('pane_titik_1').style.zIndex = 401;
        map.getPane('pane_titik_1').style['mix-blend-mode'] = 'normal';
        var layer_titik_1 = new L.geoJson(json_titik_1, {
            attribution: '<a href=""></a>',
            pane: 'pane_titik_1',
            onEachFeature: pop_titik_1,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_titik_1_0(feature));
            },
        });
        bounds_group.addLayer(layer_titik_1);
        map.addLayer(layer_titik_1);
        var baseMaps = {};
        L.control.layers(baseMaps,{'<img src="titik/legend/titik_1.png" /> titik': layer_titik_1,'ADMINISTRASIKECAMATAN_AR<br /><table><tr><td style="text-align: center;"><img src="titik/legend/ADMINISTRASIKECAMATAN_AR_0_Blahbatuh0.png" /></td><td>Blahbatuh</td></tr><tr><td style="text-align: center;"><img src="titik/legend/ADMINISTRASIKECAMATAN_AR_0_Gianyar1.png" /></td><td>Gianyar</td></tr><tr><td style="text-align: center;"><img src="titik/legend/ADMINISTRASIKECAMATAN_AR_0_Payangan2.png" /></td><td>Payangan</td></tr><tr><td style="text-align: center;"><img src="titik/legend/ADMINISTRASIKECAMATAN_AR_0_Sukawati3.png" /></td><td>Sukawati</td></tr><tr><td style="text-align: center;"><img src="titik/legend/ADMINISTRASIKECAMATAN_AR_0_Tampaksiring4.png" /></td><td>Tampaksiring</td></tr><tr><td style="text-align: center;"><img src="titik/legend/ADMINISTRASIKECAMATAN_AR_0_Tegalallang5.png" /></td><td>Tegalallang</td></tr><tr><td style="text-align: center;"><img src="titik/legend/ADMINISTRASIKECAMATAN_AR_0_Ubud6.png" /></td><td>Ubud</td></tr><tr><td style="text-align: center;"><img src="titik/legend/ADMINISTRASIKECAMATAN_AR_0_7.png" /></td><td></td></tr></table>': layer_ADMINISTRASIKECAMATAN_AR_0,}).addTo(map);
        setBounds();
        </script>
</body>
</html>