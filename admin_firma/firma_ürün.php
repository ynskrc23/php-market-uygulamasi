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
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
            $uye=$_SESSION["uye"]; 
            $eposta=$_SESSION["eposta"];
            $b= $_SESSION["firma"];         
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
       <div id="left">
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
            <div class="inner" style="min-height:1200px;">

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>ÜRÜN İŞLEMLERİNE HOŞGELDİNİZ</h3>
                    </div>
                </div>
                <hr /> 

                <!--ÜRÜN EKLEME MODAL -->            
                <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uiModal">Ürün Ekle</a><hr /> 
                <div class="modal fade" id="uiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" style="margin-left: 200px;" id="H3">Ürün Ekleme</h4>
                            </div>
                                <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Ürün İsim</label>
                                        <input class="form-control" name="urun_isim" required />                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Kategori</label>
                                            <?php $ustkategorilist = $db->query("SELECT * FROM kategori where kategori_ust=0")->fetchAll(PDO::FETCH_ASSOC); ?>
                                            <select class="form-control" name="urun_kategori" id="ustkategori" required>
                                                <option>Bir Kategori Seçiniz</option>
                                                <?php 
                                                    foreach ($ustkategorilist as $key => $value) {
                                                    echo '<option value="'.$value['kategori_id'].'">'.$value['kategori_isim'].'</option>';
                                                }
                                                ?>                                                                                        
                                            </select>
                                    </div>

                                    <script src="../js/jquery-3.4.0.min.js"  type="text/javascript"></script>
                                    <div class="form-group">
                                        <label>Ürün Alt Kategori</label>
                                            <select class="form-control" name="urun_altkategori" id="altkategori" disabled="disabled" required>
                                                <script type="text/javascript"> 
                                                    var sel=document.getElementById("ustkategori"),text=document.getElementById("altkategori");
                                                    sel.onchange=function(f)
                                                    {
                                                        text.disabled=(sel.value == "Bir Kategori Seçiniz");
                                                    };                  
                                                </script>
                                                <script type="text/javascript"> 
                                                $(document).ready(function(){
                                                    $("#ustkategori").change(function(){
                                                        var kategoriid=$(this).val();
                                                        $.ajax({
                                                            type:"POST",
                                                            url:"../ajax.php",
                                                            data:{"ustkategori":kategoriid},
                                                            success:function(e)
                                                            {                       
                                                                $("#altkategori").html(e);
                                                            }
                                                            });
                                                            })
                                                        });
                                                </script>                                            
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Stok</label>
                                        <input class="form-control" name="urun_stok" required />                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Fiyat</label>
                                        <input class="form-control" name="urun_fiyat" required />                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Resim</label>
                                        <input type="file" name="urun_resim" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Açıklama</label>
                                        <textarea class="form-control" name="urun_aciklama" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Tarif</label>
                                        <textarea class="form-control" name="urun_tarif" rows="5"></textarea>
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
                <!-- ÜRÜN EKLEME MODAL BİTTİ -->


                <!-- PHP ÜRÜN EKLEME KOD -->
                <?php                     
                    if(isset($_POST['btn_kaydet'])){
                        $urun_firma=$_SESSION["firma"];
                        $urun_isim = $_POST["urun_isim"];
                        $urun_kategori = $_POST["urun_altkategori"];
                        $urun_stok = $_POST["urun_stok"];
                        $urun_fiyat = $_POST["urun_fiyat"];                       
                        $urun_aciklama = $_POST["urun_aciklama"];
                        $urun_tarif = $_POST["urun_tarif"];  
                        @$urun_resim = $_POST["urun_resim"];                   
                        
                            if($_FILES){
                             
                                $maxSize = 7000000;
                                $dosyaUzantisi = substr($_FILES["urun_resim"]["name"],-4,4);
                                $dosyaAdi      = rand(1,999999).$dosyaUzantisi;
                                $dosyaYolu     = "upload/".$dosyaAdi; 
                              
                             
                                if($_FILES["urun_resim"]["size"]> $maxSize){
                                                
                                    echo '<div class="alert alert-warning">dosya boyutu 700 kb dan buyuk olamaz..</div>';
                    
                                                
                                    }
                                    else{
                                                
                                            $dosya = $_FILES["urun_resim"]["type"];
                                                    
                                                    if($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif"){
                                                            
                                                        if(is_uploaded_file($_FILES["urun_resim"]["tmp_name"])){
             
                                                        
                                                        $ok = move_uploaded_file($_FILES["urun_resim"]["tmp_name"],$dosyaYolu);
                                                        
                                                        if($ok){
                                                        
                                                        $urun_resim = $dosyaYolu;
                                                            
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
                        
                        $ekle=$db->prepare("insert into urun set urun_firma=?,urun_isim=?,urun_kategori=?,urun_stok=?,urun_fiyat=?,urun_resim=?,urun_aciklama=?,urun_tarif=?");
                        $ekle->execute(array($urun_firma,$urun_isim,$urun_kategori,$urun_stok,$urun_fiyat,$urun_resim,$urun_aciklama,$urun_tarif));
                    }
                ?>
                <!-- PHP ÜRÜN EKLEME KOD -->


                <script language="javascript">
                    function confirmDel() {
                        var agree=confirm("Bu içeriği silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!");
                        if (agree) {
                            return true ; 
                        }
                        else {
                            return false ;
                        }
                    }
                </script>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>         
                                            <th>ÜRÜN RESİM</th>                                 
                                            <th>ÜRÜN İSİM</th>
                                            <th>ÜRÜN KATEGORİ</th>
                                            <th>ÜRÜN FİYAT</th>                                   
                                            <th>ÜRÜN STOK</th>
                                            <th>GÜNCELLE</th>
                                            <th>SİL</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php                               
                                        $veri= $db->query("SELECT * FROM urun where urun_firma='$b'", PDO::FETCH_ASSOC);            
                                            foreach($veri as $row){  
                                               $row['urun_id'];
                                               $a=$row['urun_id'];
                                    ?>
                                        <tr>
                                            <td><img src="<?php echo $row["urun_resim"];?>" style="width: 50%; height: 150px;"></td>
                                            <td><?php echo $row['urun_isim'] ?></td>
                                            <td><?php echo $row['urun_kategori'] ?></td>
                                            <td><?php echo $row['urun_fiyat'] ?></td>
                                            <td><?php echo $row['urun_stok'] ?></td>
                                            <td class="center">   
                                                <button class="btn btn-inverse" data-toggle="modal" data-target="#<?php echo $a; ?>"> 
                                                Update</button>                              
                                            </td>
                                            <td class="center">
                                                <?php echo "<a href='urun_sil.php?id=".$a."'onclick='return confirmDel();'>";?>
                                                <p type="submit" name="urun_delete" class="btn btn-danger">Delete</p></a>
                                            </td>                                                                                    
                                        </tr> 
                                        <?php
                                    }
                                    ?>                                      
                                    </tbody>                           
                                </table>
                            </div>                      
                        </div>
                    </div>
                </div>
            </div>
            <!--row div bitti -->


            <!-- ÜRÜN GÜNCELLEME MODAL -->
            <div class="modal fade" id="<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" style="margin-left: 200px;" id="H3">Ürün Güncelleme</h4>
                            </div>
                                <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Ürün İsim</label>
                                        <input class="form-control" name="urun_isim"
                                            value="<?php echo $row['urun_isim']; ?>"/>                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Kategori</label>
                                            <?php $ustkategorilist = $db->query("SELECT * FROM kategori where kategori_ust=0")->fetchAll(PDO::FETCH_ASSOC); ?>
                                            <select class="form-control" name="urun_kategori" id="ust-kategori">
                                                <option>Bir Kategori Seçiniz</option>
                                                <?php 
                                                    foreach ($ustkategorilist as $key => $value) {
                                                    echo '<option value="'.$value['kategori_id'].'">'.$value['kategori_isim'].'</option>';
                                                }
                                                ?>                                                                                        
                                            </select>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label>Ürün Alt Kategori</label>
                                            <select class="form-control" name="urun_altkategori" id="alt-kategori" >
                                               
                                                <script type="text/javascript"> 
                                                $(document).ready(function(){
                                                    $("#ust-kategori").change(function(){
                                                        var kategoriid=$(this).val();
                                                        $.ajax({
                                                            type:"POST",
                                                            url:"../ajax.php",
                                                            data:{"ust-kategori":kategoriid},
                                                            success:function(e)
                                                            {                       
                                                                $("#alt-kategori").html(e);
                                                            }
                                                            });
                                                            })
                                                        });
                                                </script>                                            
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Stok</label>
                                        <input class="form-control" name="urun_stok" 
                                        value="<?php echo $row['urun_stok']; ?>"/>                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Fiyat</label>
                                        <input class="form-control" name="urun_fiyat"
                                        value="<?php echo $row['urun_fiyat']; ?>"/>                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Resim</label>
                                        <input type="file" name="urun_resim" />
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Açıklama</label>
                                        <textarea class="form-control" name="urun_aciklama" rows="5" 
                                        value="<?php echo $row['urun_aciklama']; ?>"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Ürün Tarif</label>
                                        <textarea class="form-control" name="urun_tarif" rows="5"
                                        value="<?php echo $row['urun_tarif']; ?>"></textarea>
                                    </div>                                                               
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                    <button type="submit" name="urun_update" class="btn btn-primary">Kaydet</button>                        
                                </div>
                                </form>
                            </div>
                        </div>
                </div>
                <!-- ÜRÜN GÜNCELLEME MODAL BİTTİ -->


                <!-- PHP ÜRÜN GÜNCELLEME KOD -->
                <?php 
                    if(isset($_POST['urun_update']))
                       {   
                            $urun_isim = $_POST["urun_isim"];
                            @$urun_kategori = $_POST["urun_altkategori"];
                            $urun_stok = $_POST["urun_stok"];
                            $urun_fiyat = $_POST["urun_fiyat"];                       
                            $urun_aciklama = $_POST["urun_aciklama"];
                            $urun_tarif = $_POST["urun_tarif"];  
                            @$urun_resim = $_POST["urun_resim"];
                                        
                                if($_FILES){
                                    $maxSize = 7000000;
                                    $dosyaUzantisi = substr($_FILES["urun_resim"]["name"],-4,4);
                                    $dosyaAdi      = rand(1,999999).$dosyaUzantisi;
                                    $dosyaYolu     = "upload/".$dosyaAdi;    
                                             
                                        if($_FILES["urun_resim"]["size"]> $maxSize){
                                                                
                                            echo '<div class="alert alert-warning">dosya boyutu 700 kb dan buyuk olamaz..</div>';
                                                                
                                                }
                                                    else{
                                                                
                                                            $dosya = $_FILES["urun_resim"]["type"];
                                                                    
                                                                    if($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif"){
                                                                            
                                                                        if(is_uploaded_file($_FILES["urun_resim"]["tmp_name"])){
                             
                                                                        @unlink($row["urun_resim"]);

                                                                        $ok = move_uploaded_file($_FILES["urun_resim"]["tmp_name"],$dosyaYolu);
                                                                        
                                                                        if($ok){
                                                                        
                                                                        $urun_resim = $dosyaYolu;
                                                                            
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
                        $guncelle=$db->prepare("UPDATE urun SET urun_isim=?,urun_kategori=?,urun_stok=?,urun_fiyat=?,urun_resim=?,urun_aciklama=?,urun_tarif=? WHERE urun_id=?");
                        $guncelle->execute(array($urun_isim,$urun_kategori,$urun_stok,$urun_fiyat,$urun_resim,$urun_aciklama,$urun_tarif,$a)); 
                    }
                ?>
                <!-- PHP ÜRÜN GÜNCELLEME -->

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
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
</body>
    <!-- END BODY-->
    
</html>
