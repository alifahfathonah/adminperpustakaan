<?php 
//include "auto/global_value.php";
?>
<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/ico.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Managemen Pengunjung Bookless</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/google-roboto-300-700.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="green" data-background-color="black" data-image="<?php echo base_url(); ?>assets/gmbr/side1.jpg">
            <!--
            Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
            Tip 2: you can also add an image using data-image tag
            Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
            <div class="logo">
                <a href="http://member.bookless.id" class="simple-text">
                    ELFAN ADMIN
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://member.bookless.id" class="simple-text">
                    ADMIN
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo" style="height: auto; overflow: unset;">
                        <img src="<?php echo base_url(); ?>assets/gmbr/alk.png" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            Admin
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">Profile</a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="../admin">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <i class="material-icons">timeline</i>
                            <p>Database Buku</p>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">timeline</i>
                            <p>Rekap Kunjungan</p>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <i class="material-icons">timeline</i>
                            <p>Server Status</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <p class="navbar-brand" href="#"> <?=$this->printwaktu->printtimestamp(date('Y-m-d-D',time()))?> </p>
                    </div>
                    <div class="collapse navbar-collapse">
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="card card-chart">
                                <div class="card-header" data-background-color="green" data-header-animation="false">
                                    <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                                    <canvas id="myChart" ></canvas>
                                </div>
                                <div class="card-content">
                                    
                                    <h4 class="card-title">Data Kunjungan 7 Hari Terakhir</h4>
                                    <p class="category">
                                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> peningkatan kunjungan hari ini.</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> updated 4 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">nature_people</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Sekarang Online</p>
                                    <h3 id="now_online" class="card-title">Loading...</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">verified_user</i> <strong><?=$this->globalvalue->batasuser()?></strong> User Maksimal
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Pengunjung Hari Ini</p>
                                    <h3 id="now_visit" class="card-title">Loading...</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">verified_user</i> Di hitung dari jam 00:00 Hari ini
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">watch_later</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Jam Baca Hari Ini</p>
                                    <h3 id="j_online" class="card-title">Loading...</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Di hitung dari jam 00:00 Hari ini
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <h3>AREA PEMASANGAN ELFAN BOOKLESS LIBRARY</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-product">
                                <div class="card-image" data-header-animation="false">
                                    <a href="#pablo">
                                        <img class="img" src="<?php echo base_url(); ?>assets/gmbr/sample3.jpg">
                                    </a>
                                </div>
                                <div class="card-content">
                                    
                                    <h4 class="card-title">
                                        <a href="#pablo">Area Kantor AL WUSTHO</a>
                                    </h4>
                                    <div class="card-description">
                                        The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                                    </div>
                                </div>
                                <div class="card-footer">
                                    
                                    <div class="stats pull-right">
                                        <p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-product">
                                <div class="card-image" data-header-animation="false">
                                    <a href="#pablo">
                                        <img class="img" src="<?php echo base_url(); ?>assets/gmbr/sample2.jpg">
                                    </a>
                                </div>
                                <div class="card-content">
                                    
                                    <h4 class="card-title">
                                        <a href="#">MASJID AL MUHTADIN</a>
                                    </h4>
                                    <div class="card-description">
                                        The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                                    </div>
                                </div>
                                <div class="card-footer">
                                    
                                    <div class="stats pull-right">
                                        <p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-product">
                                <div class="card-image" data-header-animation="false">
                                    <a href="#">
                                        <img class="img" src="<?php echo base_url(); ?>assets/gmbr/sample1.jpg">
                                    </a>
                                </div>
                                <div class="card-content">
                                    
                                    <h4 class="card-title">
                                        <a href="#">IDBC AREA</a>
                                    </h4>
                                    <div class="card-description">
                                        The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                                    </div>
                                </div>
                                <div class="card-footer">
                                    
                                    <div class="stats pull-right">
                                        <p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <strong><a href="#">AL WUSTHO </a></strong> Land of Technologies
                    </p>
                </div>
            </footer>
        </div>
    </div>
    
</body>
<script type="text/javascript">

    window.setInterval(function(){
      $.post( "async/loadactiveuser", {  })
          .done(function( data ) { 
            var res = data.split(",");
            $("#now_online").html(res[0]);
            $("#now_visit").html(res[1]);
            
   	 		$("#j_online").html(res[2]+" Menit");

          });
    }, 1000);

    

</script>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="chart.min.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url(); ?>assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        visit.initDashboardPageCharts();

    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>