<!DOCTYPE html>
<?php require_once("baglan.php"); ?>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Single | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php 
	    if(@$_SESSION){    
	    	$_SESSION["id"];       
	        $_SESSION["uye"];        
	    }
	?>  
	<!--header kısmını çagırıyoruz-->
	<?php require_once("header_kullanici.php"); ?>
	
	<section>
		<div class="container">
			<div class="row">
				
				<!--header kısmını çagırıyoruz-->
				<?php require_once("sidebar_kullanici.php"); ?>	

				<div class="col-sm-9">
					<div class="blog-post-area">
						<?php 
		                if (!isset($id)) {
		                        $id = $_GET['id'];
		                    } 

		                    $veri = $db->prepare("SELECT * FROM firma where firma_id=$id"); 
		                    $veri ->execute();
		                        if($veri->rowCount()){                           
		                        foreach($veri as $row){  
		                            $row['firma_id'];
		                            $firma_isim=$row['firma_isim'];
		                ?>
						<h2 class="title text-center"><?php echo $row['firma_isim']; ?></h2>					
						<div class="single-blog-post">
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?php echo $row['firma_yetkili']; ?></li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>

							<img src="admin_firma/<?php echo $row['firma_resim'];?>"style="width:100%; height: 300px; margin-bottom: 20px;">
							<div class="category-tab shop-details-tab"><!--category-tab-->
							<div class="col-sm-12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#details" data-toggle="tab">BİZ KİMİZ</a></li>
									<li><a href="#companyprofile" data-toggle="tab">İLETİŞİM</a></li>
									<li><a href="#tag" data-toggle="tab">ŞUBELERİMİZ</a></li>
									<li><a href="#reviews" data-toggle="tab">YORUMLAR</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="details" >
									<div class="col-sm-12">
										<div class="product-image-wrapper">
											<div class="single-products">											
												<p>
													<?php echo $row['firma_hakkinda']; ?>
												</p>											
											</div>
										</div>
									</div>
								</div>
								
								<div class="tab-pane fade" id="companyprofile" >
									<div class="col-sm-12">
										<div class="product-image-wrapper">
											<div class="single-products">											
											<p>
												<?php echo $row['firma_iletisim']; ?>
											</p>	
											</div>
										</div>
									</div>
								</div>
								
								<div class="tab-pane fade" id="tag" >
									<div class="col-sm-12">
										<div class="product-image-wrapper">
											<div class="single-products">
												<?php 
													$veri = $db->prepare("select * from sube where sube_yetkili=(select uye_id from uye where uye_firmaad=?)"); 
								                    $veri ->execute(array($firma_isim));								                   
								                        if($veri->rowCount()){                           
								                        foreach($veri as $row){  
								                            $row['sube_id'];
								                            $a= $row['sube_id'];                               
						                        ?>
						                        <?php echo "<a href='blog_single_kullanici_sube.php?id=".$a."' class='btn btn-primary'>";?>Şubemizi İnceleyiniz</a>
						                        <?php
						                        }
						                    	}
						                        ?> 
											</div>
										</div>
									</div>					
								</div>
								
								<div class="tab-pane fade" id="reviews" >
									<div class="col-sm-12">	

									<!-- yorum listele -->
									<?php 
									$veri = $db->prepare("SELECT * FROM yorum where yorum_firmaid=?");
									$veri->execute(array($id));
									  
									$x = $veri->fetchAll();
									$xx = $veri->rowCount();								  
										if($xx){	
											foreach($x as $b){	
									?>
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?php echo $b["yorum_adsoyad"];?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo $b["yorum_tarih"];?></a></li>
										<p><?php echo $b["yorum_mesaj"];?></p>
									</ul>
									<?php
									}  
									}
									  	else{		  
											echo "Yorum bulunmamaktadır ilk yazan sen ol";  
									  	}		
									?>	
									<!-- yorum listele bitti -->

									<!-- yorum Modal -->
								    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Yorum Yapınız</button>
								    <div class="modal fade" id="myModal" role="dialog">
								        <div class="modal-dialog">
								        <!-- Modal content-->
								        <div class="modal-content">
								            <div class="modal-header text-center">
								            <h4 class="modal-title">Firma Hakkında Görüşünüz</h4>
								            </div>
								            <div class="modal-body">
								            <form action="" method="post">
								                <div class="form-group">
								                <label for="recipient-name" class="col-form-label">Ad-Soyad</label>
								                <input type="text" class="form-control" name="yorum_adsoyad" required/>
								                </div>
								                <div class="form-group">
								                <label for="exampleFormControlTextarea1">Yorumunuz</label>
								                <textarea class="form-control" name="yorum_mesaj" rows="3" required></textarea>
								                </div>
								            </div>
								            <div class="modal-footer">
								            <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
								            <button type="submit" name="btn_yorum" class="btn btn-primary">Gönder</button>
								            </div>
											</form>
								        </div>
								        </div>
								    </div>
								    <!-- yorum Modal bitiş -->

								    <!-- yorum gönderme kodu -->
									<?php
									if(isset($_POST['btn_yorum']))
									{	
										$yorum_adsoyad = $_POST["yorum_adsoyad"];
										$yorum_mesaj = $_POST["yorum_mesaj"];
										$yorum_firmaid = $id;
										
										$ekle=$db->prepare("insert into yorum set yorum_adsoyad=?,yorum_mesaj=?,yorum_firmaid=?");
										$ekle->execute(array($yorum_adsoyad,$yorum_mesaj,$yorum_firmaid));
									}
									?>
									<!-- yorum gönderme kodu bitti -->

									</div>
								</div>
								
							</div>
							</div><!--/category-tab-->	

						</div>
					</div><!--/blog-post-area-->
					<?php
                    }
                	}
                    ?>								
				</div>	
			</div>
		</div>
	</section>
	
	<!--footer kısmını çagırıyoruz-->
	<?php require_once("footer.php"); ?>
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>