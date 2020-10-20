<?php require_once("../baglan.php"); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="tr"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>SANAL | MARKET </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/layout2.css" rel="stylesheet" />
    <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
    <link href="assets/plugins/jquery-steps-master/demo/css/jquery.steps.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/jquery.min.js"></script>
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >
    <?php session_start(); ?>
    <?php 
        if($_SESSION){     
            $id=$_SESSION["id"];          
            $uye=$_SESSION["uye"]; 
            $eposta=$_SESSION["eposta"];        
        }
    ?>  
    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

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

                                <?php echo "<a href='firma_read_mail.php?id=".$a."'>";?>
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
                                <a class="text-center" href="firma_bildirim.php">
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
                    <a href="index.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
                        ANASAYFA            
                    </a>               
                </li>

                <!-- FİRMA CRUD İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_ürün.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav1">
                        ÜRÜN İŞLEMLERİ            
                    </a>               
                </li>
                <!-- FİRMA CRUD BİTTİ -->


                <!-- SİPARİŞ İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_siparis.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav3">
                        SİPARİŞ İŞLEMLERİ                                     
                    </a>
                    
                </li>
                <!-- SİPARİŞ  BİTTİ -->

                <!-- FİRMA İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav4">
                        FİRMA BİLGİLERİ                                   
                    </a>
                    <ul class="collapse" id="blank-nav4">                        
                        <li><a href="firma_bilgi.php"><i class="icon-angle-right"></i>FİRMA BİLGİLERİ</a></li>
                        <li><a href="firma_sube.php"><i class="icon-angle-right"></i>ŞUBE BİLGİLERİ</a></li>
                    </ul>
                </li>
                <!-- FİRMA BİTTİ -->

                <!-- İSTATİSTİKLER İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_istatistik.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav5">
                        İSTATİSTİK İŞLEMLERİ                                     
                    </a>
                    
                </li>
                <!-- İSTATİSTİKLER BİTTİ -->

                <!-- İNDİRİM İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_indirim.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav7">
                        İNDİRİM İŞLEMLERİ                                     
                    </a>                   
                </li>
                <!-- İNDİRİM BİTTİ -->

                <!-- MESAJ İŞLEMLERİ KISMI -->
                <li class="panel">
                    <a href="firma_mailbox.php" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav8">
                        MESAJ İŞLEMLERİ                                     
                    </a>
                </li>
                <!-- MESAJ BİTTİ -->

                <li><a href="cikis.php"><i class="icon-signin"></i> Login Page </a></li>

             </ul>

        </div>
        <!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">  
            <div class="inner" style="min-height: 800px;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3> ŞUBE EKLEME İŞLEMİNE HOŞGELDİNİZ </h3>
                    </div>
                </div>
                <hr />

            <!--BLOCK SECTION -->
            <div class="row">
                <div class="col-lg-10">
                    <form action="" method="post" enctype="multipart/form-data"> 
                        <label for="text1" class="control-label col-lg-4">Şube İsim</label>
                        <div class="col-lg-8">
                            <input type="text" id="text1" name="sube_isim" class="form-control" required/><br>
                        </div>
                        <label class="control-label col-lg-4">Şube Reyon</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="sube_reyon" id="sube_reyon" required/></span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>                                           
                        <label for="limiter" class="control-label col-lg-4" >Şube Hakkında</label><br>
                        <div class="col-lg-8">
                            <textarea id="limiter" name="sube_hakkinda" class="form-control" rows="8" required></textarea><br>
                        </div>
                        <label for="limiter1" class="control-label col-lg-4">Şube İletişim</label><br>
                        <div class="col-lg-8">
                            <textarea id="limiter1" name="sube_iletisim" class="form-control" rows="8" required></textarea><br>
                        </div>                                                       
                        <button type="submit" name="btn_sube" class="btn btn-primary pull-right" style="margin-right: 15px;">Kaydet</button>
                    </form>                                                      
                </div>
            </div>   

            <!-- şube ekleme kod -->  
            <?php                     
                    if(isset($_POST['btn_sube'])){
                        $sube_isim=$_POST["sube_isim"];
                        $sube_hakkinda = $_POST["sube_hakkinda"];
                        $sube_iletisim = $_POST["sube_iletisim"];
                        $sube_yetkili = $id;
                        @$sube_reyon = $_POST["sube_reyon"];                   
                        
                            if($_FILES){
                             
                                $maxSize = 7000000;
                                $dosyaUzantisi = substr($_FILES["sube_reyon"]["name"],-4,4);
                                $dosyaAdi      = rand(1,999999).$dosyaUzantisi;
                                $dosyaYolu     = "upload/".$dosyaAdi; 
                              
                             
                                if($_FILES["sube_reyon"]["size"]> $maxSize){
                                                
                                    echo '<div class="alert alert-warning">dosya boyutu 700 kb dan buyuk olamaz..</div>';
                                                                   
                                    }
                                    else{
                                                
                                            $dosya = $_FILES["sube_reyon"]["type"];
                                                    
                                                    if($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif"){
                                                            
                                                        if(is_uploaded_file($_FILES["sube_reyon"]["tmp_name"])){
             
                                                        
                                                        $ok = move_uploaded_file($_FILES["sube_reyon"]["tmp_name"],$dosyaYolu);
                                                        
                                                        if($ok){
                                                        
                                                        $sube_reyon = $dosyaYolu;
                                                            
                                                        }else {
                                                            
                                                        echo '<div class="alert alert-warning">dosya tasınamadı...</div>';

                                                            
                                                        }
                                                                
                                                            }else{
                                                                
                                                                 echo '<div class="alert alert-warning">dosya yuklenemedi..</div>';
                                                            }
                                                                                                 
                                                            
                                                        }else{
                                                            
                                                            echo '<div class="alert alert-warning">dosya formati sadece resim olmalıdır...</div>';
                                                            
                                                        }                                      
                                                
                                            }
                             
                         }
                        
                        $ekle=$db->prepare("insert into sube set sube_isim=?,sube_reyon=?,sube_hakkinda=?,sube_iletisim=?,sube_yetkili=?");
                        $ekle->execute(array($sube_isim,$sube_reyon,$sube_hakkinda,$sube_iletisim,$sube_yetkili));                   
                    }
                ?>
            <!-- şube ekleme kod bitti -->
            </div>
            <!--END BLOCK SECTION --> 

        </div>
     <!--END PAGE CONTENT -->

        <!-- RIGHT STRIP  SECTION -->
        <div id="right">
            <div class="well well-small">
                <ul class="list-unstyled">
                    <li>Visitor &nbsp; : <span>23,000</span></li>
                    <li>Users &nbsp; : <span>53,000</span></li>
                    <li>Registrations &nbsp; : <span>3,000</span></li>
                </ul>
            </div>

        </div>
         <!-- END RIGHT STRIP  SECTION -->
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
    <script src="assets/plugins/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script>
    <script src="assets/plugins/jquery-steps-master/build/jquery.steps.js"></script>   
    <script src="assets/js/WizardInit.js"></script> 
    <script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>
