<!DOCTYPE html>
<?php require_once("baglan.php"); ?>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SANAL | MARKET</title>
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

	<!--header kısmını çagırıyoruz-->
	<?php require_once("header.php"); ?>

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<!--header kısmını çagırıyoruz-->
				<?php require_once("sidebar.php"); ?>	
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">HAFTANIN ÜRÜNLERİ</h2>
						<?php $haftalıkürünlist= $db->query("select  * from urun where urun_id=28 or urun_id=21 or urun_id=22 or urun_id=23 or urun_id=24 or urun_id=25	 ")->fetchAll(PDO::FETCH_ASSOC); ?>
								<?php 
									foreach ($haftalıkürünlist as $key => $value){
										$value['urun_id'];
                                    	@$a=$urun['urun_id'];
								?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
											<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>

										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<p><?php echo $value['urun_isim'];?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Sepete Ekle</a>
											</div>
										</div>
								</div>
								
							</div>
						</div>
					<?php } ?>
						
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">

							<ul class="nav nav-tabs">
								<li class="active"><a href="#meyvesebze" data-toggle="tab">MEYVE,SEBZE</a></li>
								<li><a href="#etbalik" data-toggle="tab">ET,BALIK,KÜMES</a></li>
								<li><a href="#kahvaltilik" data-toggle="tab">SÜT,KAHVALTILIK</a></li>
								<li><a href="#gida" data-toggle="tab">GIDA,ŞEKERLEME</a></li>
								<li><a href="#icecek" data-toggle="tab">İÇECEK</a></li>
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="meyvesebze" >

								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=10 or urun_kategori=11)")->fetchAll(PDO::FETCH_ASSOC);															
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>								
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>
								
								
							</div>
							
							<div class="tab-pane fade" id="etbalik" >

								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=12 or urun_kategori=13 or urun_kategori=14 or urun_kategori=15)")->fetchAll(PDO::FETCH_ASSOC);
								
								?>
								<?php 
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>

								
								
							</div>
							
							<div class="tab-pane fade" id="kahvaltilik" >
								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=16 or urun_kategori=17 or urun_kategori=18 or urun_kategori=19 or urun_kategori=20 or urun_kategori=21 or urun_kategori=22 or urun_kategori=23 or urun_kategori=24  )")->fetchAll(PDO::FETCH_ASSOC);
								
								?>
								<?php 
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>

								
							</div>
							
							<div class="tab-pane fade" id="gida" >
								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=25 or urun_kategori=26 or urun_kategori=27 or urun_kategori=28 or urun_kategori=29 or urun_kategori=30 or urun_kategori=31 or urun_kategori=32 or urun_kategori=33 or urun_kategori=34 or urun_kategori=35 or urun_kategori=36 or urun_kategori=37 or urun_kategori=38)")->fetchAll(PDO::FETCH_ASSOC);
								
								?>
								<?php 
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>
								
							</div>
							
							<div class="tab-pane fade" id="icecek" >
								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=39 or urun_kategori=40 or urun_kategori=41 or urun_kategori=42 or urun_kategori=43 or urun_kategori=44 )")->fetchAll(PDO::FETCH_ASSOC);
								
								?>
								<?php 
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;"  >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>
								
							</div>
						</div>
					</div><!--/category-tab-->
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">

							<ul class="nav nav-tabs">
								<li><a href="#temizlik" data-toggle="tab">DETERJAN,TEMİZLİK</a></li>
								<li><a href="#kozmetik" data-toggle="tab">KAĞIT,KOZMETİK</a></li>
								<li><a href="#bebek" data-toggle="tab">BEBEK,OYUNCAK</a></li>
								<li><a href="#ev" data-toggle="tab">EV,PET</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="temizlik" >
								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=45 or urun_kategori=46 or urun_kategori=47 or urun_kategori=48 or urun_kategori=49 or urun_kategori=50 )")->fetchAll(PDO::FETCH_ASSOC);
								
								?>
								<?php 
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>
								
							</div>
						

						
							<div class="tab-pane fade active in" id="kozmetik" >
								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=51 or urun_kategori=52 or urun_kategori=53 or urun_kategori=54 or urun_kategori=55 or urun_kategori=56 or urun_kategori=57 or urun_kategori=58 or urun_kategori=59 or urun_kategori=60 or urun_kategori=61 or urun_kategori=62 )")->fetchAll(PDO::FETCH_ASSOC);
								
								?>
								<?php 
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>
								
							</div>
						

						
							<div class="tab-pane fade active in" id="bebek" >
								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=63 or urun_kategori=64 or urun_kategori=65 or urun_kategori=66  )")->fetchAll(PDO::FETCH_ASSOC);
								
								?>
								<?php 
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>
								
							</div>
						

						
							<div class="tab-pane fade active in" id="ev" >
								<?php	
								$urunlist= $db->query("select * from urun where (urun_kategori=67 or urun_kategori=68 or urun_kategori=69 or urun_kategori=70 or urun_kategori=71 or urun_kategori=72 or urun_kategori=73 )")->fetchAll(PDO::FETCH_ASSOC);
								
								?>
								<?php 
									foreach ($urunlist as $key => $value){
										$value['urun_id'];
                                    	$a=$value['urun_id'];
								?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="admin_firma/<?php echo $value['urun_resim'];?>" style="width: 100%; height: 150px;" >
												<h2><?php echo $value['urun_fiyat'];?> TL</h2>
												<h3><?php echo $value['urun_isim'];?></h3>
												<?php echo "<a href='product-details.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
												<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											</div>
											
										</div>
									</div>
									</div>
								
								<?php } ?>
								
							</div>
						</div>
					</div>
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Öne Çıkan Firmalar</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

							<div class="carousel-inner">
								

								<div class="item active">
									<?php $firmalist= $db->query("select * from firma ")->fetchAll(PDO::FETCH_ASSOC); ?>
								<?php 
									
									foreach ($firmalist as $key => $value){
										$value['firma_id'];
                                    	$a=$value['firma_id'];
								
									
								?>	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin_firma/<?php echo $value['firma_resim'];?>" style="width: 100%; height: 150px;" >
													<h3 href="#" class="btn btn-default add-to-cart"><?php echo $value['firma_isim'];?></h3>
													
												</div>
												
											</div>
										</div>


									</div>
									
									<?php } ?>
								</div>
								

							</div>
							
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>

	<!--footer kısmını çagırıyoruz-->
	<?php require_once("footer.php"); ?>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>