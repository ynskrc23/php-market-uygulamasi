<?php require_once("../baglan.php"); ?>
<!DOCTYPE html>
<html>
  <!-- BEGIN HEAD-->
<head>
   
    <meta charset="UTF-8" />
    <title>SANAL | MARKET</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- Font Awesome Icons -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL  STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END  HEAD-->
  <body class="padTop53 " >
    <?php session_start(); ?>
    <div id="wrap">
      
     <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.php" class="navbar-brand">
                    <img src="assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                    <!-- MESSAGES SECTION -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="label label-success">2</span><i class="icon-envelope-alt"></i>&nbsp; <i class="icon-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <?php                           
                                $veri = $db->prepare("SELECT * FROM  mesaj where mesaj_okundu='0' and mesaj_alici='$eposta'"); 
                                $veri ->execute();
                                    if($veri->rowCount()){                           
                                        foreach($veri as $row){  
                                        $row['mesaj_id']; 
                                        $a=$row['mesaj_id']; 
                                ?>

                                <?php echo "<a href='admin_read_mail.php?id=".$a."'>";?>
                                    <div>
                                        <span class="pull-right text-muted">
                                        <em><?php echo $row['mesaj_tarih'] ?></em>
                                        </span><br>
                                        <strong><?php echo $row['mesaj_gonderen'] ?></strong>
                                        <div><?php echo $row['mesaj_konu'] ?></div>      
                                    </div>                                   
                                </a>
                                <?php
                                }
                                }
                                else{    
                                    echo '<a class="text-center"> Mesaj bulunmamaktadır</a>';  
                                }
                                ?>
                            </li>
                            
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="admin_bildirim.php">
                                    <strong>Tümünü Oku</strong>
                                    <i class="icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <!--END MESSAGES SECTION -->

                                        
                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>                          
                            <li class="divider"></li>
                            <li><a href="cikis.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



      

        
        <!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading" style="font-weight: inherit; text-transform: capitalize; font-size: 16px;">
                        <?php 
                        if($_SESSION){               
                            echo $_SESSION["uye"];        
                        }
                        ?>  
                    </h5>
                    <ul class="list-unstyled user-info">                      
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                    </ul>
                </div>
                <br />
            </div>

           <ul id="menu" class="collapse">

                <li class="panel">
                    <a href="index.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
                        ANASAYFA          
                    </a>               
                </li>

                <!-- FİRMA CRUD İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="admin_firma.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav1">
                        FİRMA İŞLEMLERİ            
                    </a>               
                </li>
                <!-- FİRMA CRUD BİTTİ -->

                <!-- MÜŞTERİ CRUD İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="admin_kullanıcı.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav2">
                        MÜŞTERİ İŞLEMLERİ                                     
                    </a>                   
                </li>
                <!-- MÜŞTERİ CRUD BİTTİ -->


                <!-- ADMİN ONAY İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="admin_onay.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav3">
                        ONAY İŞLEMLERİ                                     
                    </a>                  
                </li>
                <!-- ADMİN ONAY  BİTTİ -->

                <!-- ADMİN SANALKART İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="admin_sanalkart.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav3">
                        SANALKART İŞLEMLERİ                                     
                    </a>          
                </li>
                <!-- ADMİN SANALKART  BİTTİ -->

                <!-- MESAJ İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="admin_mailbox.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav4">
                        MESAJ İŞLEMLERİ                                     
                    </a>             
                </li>
                <!-- MESAJ BİTTİ -->

                <!-- İSTATİSTİKLER İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="admin_istatistik.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav5">
                        İSTATİSTİK İŞLEMLERİ                                     
                    </a>           
                </li>
                <!-- İSTATİSTİKLER BİTTİ -->

                <li><a href="cikis.php"><i class="icon-signin"></i> Login Page </a></li>

             </ul>
        </div>
        <!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">
        <div class="inner" style="min-height:700px;">

        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h3>MESAJ İŞLEMLERİNE HOŞGELDİNİZ</h3>
          <hr />
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-2">
              <a href="admin_mailbox.php" class="btn btn-primary btn-block margin-bottom">Gelen Kutusuna Git</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Klasörler</h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="admin_mailbox.php"><i class="fa fa-inbox"></i> Gelen Kutusu <span class="label label-primary pull-right"></span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Gönderilen</a></li>
                    <li><a href="#"><i class="fa fa-file-text-o"></i> Taslaklar</a></li>
                    <li><a href="#"><i class="fa fa-filter"></i> Önemsiz <span class="label label-waring pull-right"></span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Çöp</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->

             <div class="col-md-10">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Yeni Mesaj Oluştur</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input class="form-control" name="mesaj_alici" placeholder="To:"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="mesaj_konu" placeholder="Subject:"/>
                  </div>
                  <div class="form-group">
                    <textarea id="compose-textarea" name="mesaj_icerik" class="form-control" rows="15"></textarea>
                  </div><br>             
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" name="btn_mesaj" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gönder</button>
                  </div>
                </div><!-- /.box-footer -->
                </form>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <!-- PHP mesaj gönderme KOD -->
      <?php                     
          if(isset($_POST['btn_mesaj'])){
            $mesaj_gonderen=$_SESSION["uye"];
            $mesaj_alici = $_POST["mesaj_alici"];
            $mesaj_konu = $_POST["mesaj_konu"];
            $mesaj_icerik = $_POST["mesaj_icerik"];
                       
            $ekle=$db->prepare("insert into mesaj set mesaj_gonderen=?,mesaj_alici=?,mesaj_konu=?,mesaj_icerik=?");
            $ekle->execute(array($mesaj_gonderen,$mesaj_alici,$mesaj_konu,$mesaj_icerik));
          }
      ?>
      <!-- PHP mesaj gönderme KOD -->



      </div >
      </div>
      <!--END PAGE CONTENT -->

      </div>
     <!--END MAIN WRAPPER -->

      <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->

     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- iCheck -->
    <script src="assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>
  </body>
</html>