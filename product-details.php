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
	
	<section>
		<div class="container">
			<div class="row">
				
				<!--header kısmını çagırıyoruz-->
				<?php require_once("sidebar.php"); ?>	

				<div class="col-sm-9 padding-right">
					<?php 
	                if (!isset($id)) {
	                        $id = $_GET['id'];
	                    } 

	                    $veri = $db->prepare("SELECT * FROM urun where urun_id=$id"); 
	                    $veri ->execute();
	                        if($veri->rowCount()){                           
	                        foreach($veri as $row){  
	                            $row['urun_id'];
	                            $a= $row['urun_id'];
	                ?>
					<div class="product-details"><!--product-details-->
						<!--ürün-resim-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin_firma/<?php echo $row["urun_resim"];?>" alt="" />
							</div>
						</div>
						<!--ürün-resim bitti-->
						<!--ürün-detay bilgileri-->
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2 style="text-transform: capitalize;"><?php echo $row['urun_isim']; ?></h2>
								<p>Ürün ID: <?php echo $row['urun_id']; ?></p>
								<p>Ürün Stok: <?php echo $row['urun_stok']; ?></p>
								<img src="images/product-details/rating.png" alt="" /><br>
								<span>
									<span><?php echo $row['urun_fiyat'] ?> TL</span>
									<label>Adet:</label>
									<input type="text" value="1" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Sepete Ekle
									</button>
								</span><br>	
								<?php echo "<a href='begen.php?id=".$a."' name='btn_favori' style='font-size: 20px;''>";?>
								<i class="fa fa-thumbs-up"></i>Favori</a>
								<span style="font-size: 20px;"><?php echo $row['urun_favori']; ?></span>
							</div><!--/product-information-->
						</div>
						<!--ürün-detay bilgileri bitti-->
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Ürün Bilgisi</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Ürün Tarif</a></li>
								<li><a href="#tag" data-toggle="tab">Firma Bilgisi</a></li>
								<li><a href="#reviews" data-toggle="tab">Yorumlar</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12">
									<div class="product-image-wrapper">
										<div class="single-products">											
												<p><?php echo $row['urun_aciklama']; ?></p>											
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-12">
									<div class="product-image-wrapper">
										<div class="single-products">											
											<?php echo $row['urun_tarif']; ?>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-12">
									<div class="product-image-wrapper">
										<div class="single-products">
											<?php echo $row['urun_firma']; ?>
										</div>
									</div>
								</div>					
							</div>
							

							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<!-- yorum listele -->
									<?php 
									$veri = $db->prepare("SELECT * FROM yorum where yorum_urunid=?");
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
								            <h4 class="modal-title">Ürün Hakkında Görüşünüz</h4>
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
								            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
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
										$yorum_urunid = $id;
										
										$ekle=$db->prepare("insert into yorum set yorum_adsoyad=?,yorum_mesaj=?,yorum_urunid=?");
										$ekle->execute(array($yorum_adsoyad,$yorum_mesaj,$yorum_urunid));
									}
									?>
									<!-- yorum gönderme kodu bitti -->
									
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					<?php
	                }
	                }
	                ?>
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>