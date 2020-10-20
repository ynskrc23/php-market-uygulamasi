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
	<?php 
	    if(@$_SESSION){    
	    	$_SESSION["id"];       
	        $_SESSION["uye"];        
	    }
	?>  
	<!--header kısmını çagırıyoruz-->
	<?php require_once("header_kullanici.php"); ?>
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				
				<!--header kısmını çagırıyoruz-->
				<?php require_once("sidebar_kullanici.php"); ?>	
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Ürünler</h2>
						<?php 
			                if (!isset($id)) {
			                        $id = $_GET['id'];
			                    } 

			                    $veri = $db->prepare("SELECT * FROM urun where urun_kategori=$id"); 
			                    $veri ->execute();
			                        if($veri->rowCount()){                           
			                        foreach($veri as $row){  
			                            $row['urun_id'];
			                            $a=$row['urun_id'];
			            ?>						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin_firma/<?php echo $row["urun_resim"];?>" style="width: 100%; height: 150px;">
										<h2><?php echo $row['urun_fiyat'] ?> TL</h2>
										<p><?php echo $row['urun_isim'] ?></p>
										<?php echo "<a href='product-details_kullanici.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
										<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
										<h2><?php echo $row['urun_fiyat'] ?> TL</h2>
										<p><?php echo $row['urun_isim'] ?></p>
										<?php echo "<a href='product-details_kullanici.php?id=".$a."' class='btn btn-default add-to-cart'>";?>
										<i class="fa fa-shopping-cart"></i>Ürün Detay</a>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
                        }
                    	}
                        ?>      						
					</div><!--features_items-->
					<ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>
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