<?php require_once("../baglan.php"); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="tr"> <!--<![endif]-->

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
    <!-- BEGIN BODY-->
<body class="padTop53 " >
    <?php session_start(); ?>
    <?php 
        if($_SESSION){ 
            $id=$_SESSION["id"];              
            $uye=$_SESSION["uye"]; 
            $eposta=$_SESSION["eposta"]; 
            $firma=$_SESSION["firma"];          
        }
    ?> 
     <!-- MAIN WRAPPER -->
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
                    <img src="assets/img/logo.png" alt="" />
                        
                        </a>
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

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>KULLANICI İSTATİSTİK İŞLEMLERİNE HOŞGELDİNİZ</h3>
                    </div>
                </div>
                <hr />

                <div class="row">
                    <div class="col-lg-12 ">
                     	<div class="panel panel-default">
                            <div class="panel-heading text-center">
                                GENEL İSTATİSTİK DURUMU
                            </div>
                            
                            <div class="panel-body">
                            <!-- ÜRÜNLERE YAPILAN TOPLAM YORUM SAYISI -->	
                            <?php 
                                $a=$db->prepare("SELECT yorum_urunid FROM yorum WHERE yorum_adsoyad='$uye'");
                                $a->execute();
                                    foreach($a as $row){                                   
                                        $m=$row["yorum_urunid"]; 
                                        $veri = $db->prepare("SELECT * FROM urun where urun_id=?");                        
                                        $veri->execute(array($m));                         
                                        $x = $veri->fetchAll();
                                        $xx = $a->rowCount();                                  
                                            if($xx){    
                                                foreach($x as $b){  
                            ?>
                            <?php
                            }  
                            }                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            } 
                            }    
                            ?>                        
                            <p>Toplam Yorum Sayısı:<b> <?php echo $xx;?></b></p>
                            <!-- ÜRÜNLERE YAPILAN TOPLAM YORUM SAYISI BİTTİ -->

                            <!-- ÜRÜNLERE YAPILAN TOPLAM BEĞENİ SAYISI -->
                            <?php 
								$veri = $db->prepare("SELECT * FROM begeni where begenen_id=? ");
								$veri->execute(array($id));
									  
								$x = $veri->fetchAll();
								$xx = $veri->rowCount();								  
									if($xx){	
										foreach($x as $b){	
							?>
                            <p>Toplam Beğenilen Ürün Sayısı:<b> <?php echo $xx;?></b></p>
                            <?php
							}  
							}                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            }                               
                            ?>  
                            <!-- ÜRÜNLERE YAPILAN TOPLAM BEĞENİ SAYISI BİTTİ -->

                           
                            </div>                                   
                        </div>  
                    </div>
                </div>
                <hr />
                           
                <div class="row">                  
                    <div class="col-lg-4">                   
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                ÜRÜNLERE YAPILAN YORUMLAR
                            </div>
                            
                            <div class="panel-body">
                            <?php 
                                $a=$db->prepare("SELECT yorum_urunid FROM yorum WHERE yorum_adsoyad='$uye'");
                                $a->execute();
                                    foreach($a as $row){                                   
                                        $m=$row["yorum_urunid"]; 
                                        $veri = $db->prepare("SELECT * FROM urun where urun_id=?");                        
                                        $veri->execute(array($m));                         
                                        $x = $veri->fetchAll();
                                        $xx = $a->rowCount();                                  
                                            if($xx){    
                                                foreach($x as $b){  
                            ?>
                            <p style="float:right;"><?php echo $b["urun_firma"];?></p>
                            <p><?php echo $b["urun_isim"];?></p>
                            <?php
                            }  
                            }                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            } 
                            }    
                            ?>  
                            </div>          
                            <div class="panel-footer">
                                Toplam Yorum Sayısı:<b><?php echo $xx;?></b>            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">                   
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                ÜRÜNLERE YAPILAN BEĞENİ
                            </div>
                            
                            <div class="panel-body">
                            <?php 
                            
                                $a=$db->prepare("SELECT begenilen_id FROM begeni WHERE begenen_id='$id'");
                                $a->execute();
                                    foreach($a as $row){                                   
                                        $m=$row["begenilen_id"]; 
                                        $veri = $db->prepare("SELECT * FROM urun where urun_id=?");                        
                                        $veri->execute(array($m));                         
                                        $x = $veri->fetchAll();
                                        $xx = $a->rowCount();                                  
                                            if($xx){    
                                                foreach($x as $b){  
                            
							?>
                            <p><?php echo $b["urun_isim"];?></p>
                            <?php
							}  
							}                          
                            else{         
                                echo "Veri bulunmamaktadır";  
                            } 
                            }                              
                            ?>  
                            </div>          
                            <div class="panel-footer">
                                Toplam Beğeni Sayısı:<b><?php echo $xx;?></b>            
                            </div>
                        </div>
                    </div>
                
                </div>
               
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
</body>
    <!-- END BODY-->
    
</html>
