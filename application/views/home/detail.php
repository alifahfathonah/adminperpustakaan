<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Contoh View Detail Data Dengan Modal Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('bootstrap/fa/css/font-awesome.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('bootstrap/css/navbar-top-fixed.css');?>" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="<?php echo base_url();?>">Ozs</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('mahasiswa');?>">Data Mahasiswa </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
      
      <?php
      if(isset($page)){
		  $this->load->view($page);
		  
	  } else {
		  
	echo '<div class="jumbotron">
        <h1>Contoh Dialog Konfirmasi Dengan Bootstrap</h1>
        <p class="lead">Script kali ini adalah contoh script membuat konfirmasi dialog dengan bootstrap, pada umumnya jika tidak menggunakan bootstrap pasti menggunakan javascript dengan fungsi alert(). Untuk melihat demo-nya silahkan klik menu Data mahasiswa dan lakukan penghapusan data.</p>
        
      </div>';			
		  
	  }
      
      
      ?>
      
      
      
    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('bootstrap/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/js/jquery-3.2.1.slim.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/filestyle/src/bootstrap-filestyle.js');?>"></script>

    <script>
    $(document).ready(function() {
			// ketika tombol detail ditekan
		$('.detail-mahasiswa').on("click", function(){
		// ambil nilai id dari link print
		var DataMahasiswa= this.id;
		var datanya = DataMahasiswa.split("|");
		if (datanya[4]=='L') { var jk='Laki-laki';} else {var jk='Perempuan';}
		$("#IsiModal").html('<table width="100%" style="font-size:14px"><tr><td rowspan="7"><img src="<?php echo base_url('images/ozs.png');?>" class="rounded"></td></tr><tr><td width="150">No. Induk</td><td width="10">:</td><td>'+datanya[0]+'</td></tr><tr><td>Nama Lengkap</td><td>:</td><td>'+datanya[1]+'</td></tr><tr><td>Tempat, Tanggal  Lahir</td><td>:</td><td>'+datanya[2]+', '+datanya[3]+'</td></tr><tr><td>Jenis Kelamin</td><td>:</td><td>'+jk+'</td></tr><tr><td>Program Studi</td><td>:</td><td>'+datanya[5]+'</td></tr><tr><td>Jenjang</td><td>:</td><td>'+datanya[6]+'</td></tr></table>');
		});
	
	});
    </script>
    
    
    

  </body>
</html>
