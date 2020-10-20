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

		                    $veri = $db->prepare("SELECT * FROM sube where sube_id=$id"); 
		                    $veri ->execute();
		                        if($veri->rowCount()){                           
		                        foreach($veri as $row){  
		                            $row['sube_id'];
		                ?>
						<h2 class="title text-center"><?php echo $row['sube_isim']; ?> ŞUBESİ</h2>					
						<div class="single-blog-post">
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Şube Reyon Düzeni</li>						
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>

							<img src="admin_firma/<?php echo $row['sube_reyon'];?>"style="width:100%; height: 300px; margin-bottom: 20px;">
							<div class="category-tab shop-details-tab"><!--category-tab-->
							<div class="col-sm-12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#details" data-toggle="tab">BİZ KİMİZ</a></li>
									<li><a href="#companyprofile" data-toggle="tab">İLETİŞİM</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="details" >
									<div class="col-sm-12">
										<div class="product-image-wrapper">
											<div class="single-products">											
												<p>
													<?php echo $row['sube_hakkinda']; ?>
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
												<?php echo $row['sube_iletisim']; ?>
											</p>	
											</div>
										</div>
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