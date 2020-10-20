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
    <?php 
        if($_SESSION){               
            $eposta=$_SESSION["eposta"];
            $b=$_SESSION["id"];  
            $uye=$_SESSION["uye"];                 
        }
    ?> 
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

                                <?php echo "<a href='kullanici_read_mail.php?id=".$a."'>";?>
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
                                <a class="text-center" href="kullanici_bildirim.php">
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
                            echo $uye;                                             
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
                    <a href="../index_kullanici.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
                        ANASAYFA          
                    </a>               
                </li>

                <!-- SANALKART İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="kullanici_sanalkart.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav1">
                        SANALKART İŞLEMLERİ            
                    </a>               
                </li>
                <!-- SANALKART BİTTİ -->

                <!-- SİPARİŞ İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="kullanici_siparis.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav2">
                        SİPARİŞ İŞLEMLERİ                                     
                    </a>                   
                </li>
                <!-- SİPARİŞ BİTTİ -->

                 <!-- FAVORİ MARKETLERİM İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="kullanici_favori.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav2">
                        FAVORİ ÜRÜNLERİM                                     
                    </a>                   
                </li>
                <!-- FAVORİ MARKETLERİM BİTTİ -->

               
                <!-- MESAJ İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="kullanici_mailbox.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav4">
                        MESAJ İŞLEMLERİ                                     
                    </a>             
                </li>
                <!-- MESAJ BİTTİ -->
                
                <!-- İSTATİSTİKLER İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="kullanici_istatistik.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav5">
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
        <section class="content-header text-center">
          <h3>SANALKART İŞLEMLERİ</h3>
          <hr />
        </section>

        <script language="javascript">
            function confirmTalep() {
                alert("Merhabalar talebiniz işleme alınmıştır...");               
            }
        </script>  

        <form action="" method="post">
            <button type="submit" class="btn btn-success btn-sm" name="btn_sanalkart" 
            onclick="return confirmTalep();">Kart Talebi</button> <hr />   
        </form>

        <?php            
            for ($i=0;$i<10;$i++){
                $random=rand(0,1000000000);
            }
        ?>

        <!-- PHP sanalkart talebi KOD -->
            <?php                     
                if(isset($_POST['btn_sanalkart'])){
                    $sanalkart_no= $random;
                    $sanalkart_kullanici = $_SESSION["uye"]; 
                    $sanalkart_bakiye = 0;
                    $sanalkart_puan = 0;

                    $ekle=$db->prepare("insert into sanalkart set sanalkart_no=?,sanalkart_kullanici=?,sanalkart_bakiye=?,sanalkart_puan=?");
                    $ekle->execute(array($sanalkart_no,$sanalkart_kullanici,$sanalkart_bakiye,$sanalkart_puan));
                }
            ?>
        <!-- PHP sanalkart talebi KOD -->     

        <!--BLOCK SECTION -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sanalkart No</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Bakiye</th>
                                            <th>Puan</th>
                                            <th>Bakiye Yükle</th>
                                        </tr>
                                    </thead>
                                    <?php                               
                                        $veri= $db->query("SELECT * FROM sanalkart where sanalkart_durum='1' and sanalkart_kullanici='$uye'", PDO::FETCH_ASSOC);            
                                            foreach($veri as $row){  
                                               $row['sanalkart_id'];
                                               $a=$row['sanalkart_id'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['sanalkart_id'] ?></td>                                
                                            <td><?php echo $row['sanalkart_no'] ?></td>
                                            <td><?php echo $row['sanalkart_kullanici'] ?></td>
                                            <td><?php echo $row['sanalkart_bakiye'] ?> TL</td>
                                            <td><?php echo $row['sanalkart_puan'] ?> TL</td>
                                            <td class="center">   
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" 
                                            data-target="#<?php echo $a; ?>"> Yükle</button>                              
                                            </td>
                                        </tr>          
                                    </tbody>
                                    <?php
                                    }
                                    ?> 
                                    <div class="modal fade" id="<?php echo $a;?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="H3">Bakiye Ekleme</h4>
                                                </div>
                                                <div class="modal-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Fiyat Gir</label>
                                                            <input class="form-control" name="sanalkart_bakiye" required />
                                                    </div>                                                                 
                                                 </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                                <button type="submit" class="btn btn-primary" name="btn_kaydet">Kaydet</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>                                   
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- PHP ÜRÜN GÜNCELLEME KOD -->
                <?php 
                    if(isset($_POST['btn_kaydet'])){   
                        $sanalkart_bakiye = $_POST["sanalkart_bakiye"];
      
                        $guncelle=$db->prepare("UPDATE sanalkart SET sanalkart_bakiye=? WHERE sanalkart_id=?");
                        $guncelle->execute(array($sanalkart_bakiye,$a)); 
                    }
                ?>
                <!-- PHP ÜRÜN GÜNCELLEME -->
        <!--END BLOCK SECTION -->
        
        </div><!-- /.content-wrapper -->

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
  
  </body>
</html>