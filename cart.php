<?php ob_start(); ?>

<!DOCTYPE html>
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
<script type="text/javascript">
	var geneltoplam=0;
</script>
<body>
	<!--header kısmını çagırıyoruz-->
	<?php require_once("header_kullanici.php"); ?>
	<?php 
	    if(@$_SESSION){               
	         $_SESSION["uye"]; 
	           $_SESSION["id"];     
	    }
	?>  

	<section id="cart_items">
		<div class="container">
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<?php
						 $sepet=$db->query("select  * from sepet where sepet_uyeid='".$_SESSION["id"]."' and sepet_durum=0")->fetchAll(PDO::FETCH_ASSOC);
						 
					 ?>
					<thead>
						<tr class="cart_menu">
							<td class="image">Ürünler</td>
							<td class="description"></td>
							<td class="price">Fiyat</td>
							<td class="quantity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adet</td>
							<td class="total">Toplam</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
					<?php	
						$a=0;
						 $toplam=0;
						  $son=""; 
						 $x=0;
						 
						 foreach ($sepet as $key => $value)
						 	{
						 		$value['sepet_id'];
						 		$urun=$db->query("select  * from urun where urun_id='".$value["sepet_urunid"]."'")->fetchAll(PDO::FETCH_ASSOC);
					 			foreach ($urun as $keys => $values)
					 			{

					 			 $toplam= $toplam+$values['urun_fiyat']; 
					 			 $son=$toplam;
								}
					  		}
					  echo "<div id='gtop'  hidden> ".$toplam."</div>"; 
					foreach ($sepet as $key => $value){ 
						$value['sepet_id'];

						 $urun=$db->query("select  * from urun where urun_id='".$value["sepet_urunid"]."'")->fetchAll(PDO::FETCH_ASSOC);
					 	

					foreach ($urun as $keys => $values){   
						$values['urun_id'];


								$a=$a+1;
								$x=$x+1;
				 ?>
				
						<tr>
							<td class="cart_product">
								<a href=""><img src="admin_firma/<?php echo $values['urun_resim'];?>" alt="" style="width: 25%; height: 100px;" ></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $values['urun_isim'];?></a></h4>
								<p>Ürün ID: <?php echo $values['urun_id'];?></p>
							</td>
							<td id="abc" class="cart_price">
								<p><?php echo $values['urun_fiyat']; ?>.00 TL </p>
									
								 
							</td>
										
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up"   onclick="arttir('<?php echo $values['urun_id']; ?>','<?php echo $values['urun_fiyat']; ?>','<?php echo $a;?>','<?php echo $toplam; ?>')" href="#"> + </a>
									<input class="cart_quantity_input" type="text" id="<?php echo $values['urun_id']; ?>" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down"  onclick="azalt('<?php echo $values['urun_id']; ?>','<?php echo $values['urun_fiyat']; ?>','<?php echo $a;?>')" href="#"> - </a>
									<script>
										function arttir(id,fiyat,satir,toplam)
										{
												 
											var adet=document.getElementById(id);
											adet.value=Number(adet.value)+1; 
											
											document.getElementById(satir).innerHTML=Number(adet.value*fiyat)+".00 TL"; 
											 var geneltoplam=document.getElementById("gtop").innerHTML;
											 
											 geneltoplam=Number(document.getElementById("gtop").innerHTML)+Number(fiyat);
												
											document.getElementById("gtop").innerHTML=geneltoplam;
											 
											document.getElementById("toplam").innerHTML=Number(geneltoplam)+".00 TL";
											$son=Number(geneltoplam)+".00 TL";
											document.getElementById("kapida_odeme_toplam").innerHTML=Number(geneltoplam)+".00 TL";
											document.getElementById("kredikarti_odeme_toplam").innerHTML=Number(geneltoplam)+".00 TL";
											document.getElementById("sanalkart_odeme_toplam").innerHTML=Number(geneltoplam)+".00 TL";
											

										}

										function azalt(id,fiyat,satir)
										{

											var adet=document.getElementById(id);
											if(adet.value>1)
											{ 	
												 adet.value=Number(adet.value)-1;
												  document.getElementById(satir).innerHTML=Number(adet.value*fiyat)+".00 TL";
												  var geneltoplam=document.getElementById("gtop").innerHTML;
												  
												   geneltoplam=Number(document.getElementById("gtop").innerHTML)-Number(fiyat);
												  document.getElementById("gtop").innerHTML=geneltoplam;
													 
												  document.getElementById("toplam").innerHTML=Number(geneltoplam)+".00 TL";
												 $son=Number(geneltoplam)+".00 TL";
												document.getElementById("kapida_odeme_toplam").innerHTML=Number(geneltoplam)+".00 TL";
												document.getElementById("kredikarti_odeme_toplam").innerHTML=Number(geneltoplam)+".00 TL";
												document.getElementById("sanalkart_odeme_toplam").innerHTML=Number(geneltoplam)+".00 TL";

											} 
										}
										
										
						 			 </script>
								</div>
								
							</td>
							
									
							
							<td class="cart_total">
								<p id="<?php echo $a; ?>" class="cart_total_price"><?php  echo number_format($values['urun_fiyat']*1,2)?> TL</p>
							</td>
							

							<td class="cart_delete">
								<a class="cart_quantity_delete" href="sepet_sil.php?id=<?php echo $values['urun_id']; ?> &uye_id=<?php echo $_SESSION['id']?> "><i class="fa fa-times"></i></a>
							</td>
						</tr>
					
					<?php }	?>

					<?php }	?>

					</tbody>
				</table>
				
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Ödeme İşlemleri</h3>
				
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li >Toplam <span id="toplam"><script>   document.write(document.getElementById("gtop").innerHTML); </script>.00 TL</span></li>
						
							<li>Kargo Ücreti <span>Ücretsiz</span></li>
							
						</ul>
							
					</div>
				</div>
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							
							<select id="turrr"  class="form-control" required>
							<option> Ödeme Türünü Seçiniz</option>
							<option> Kapıda Ödeme</option>
							<option> Kredi Kartı</option>
							<option> Sanal Kart</option>

						</select>
							
						</ul>
						
						<a class="btn btn-default update" href="index_kullanici.php">Alışverişe Devam Et</a>
							<a class="btn btn-default check_out" href="#" data-toggle="modal" id="alisveris" data-target="#sepetModal">Alışverişi Bitir</a>
					</div>
				</div>

				<script> 
		      			$(document).ready(function(){		      				
		      				$("#turrr").change(function(){
		      					 	  
								 	if ($(this).val()=="Kredi Kartı") 
								 	{
								 		 document.getElementById("odemetur-kredikart").innerHTML=$(this).val();
								 		$('#alisveris').attr('data-target','#kredikarti');
									}
									 else if ($(this).val()=="Kapıda Ödeme") 
									 {
									 	 document.getElementById("odemetur-kapida").innerHTML=$(this).val();
								 		$('#alisveris').attr('data-target','#kapida');
									 } 
									 else if ($(this).val()=="Sanal Kart") 
									 {
									 	 document.getElementById("odemetur-sanalkart").innerHTML=$(this).val();
								 		$('#alisveris').attr('data-target','#sanalkart');
									 }

		      				})
		      			});
		      		</script>
 

						
			</div>
		</div>
		
	</section><!--/#do_action-->
				<div class="modal fade" id="kredikarti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title"  id="exampleModalLabel" style="font-size:20px; text-align:center">Ödeme Yap</h5>
						</div>
						<div class="modal-body">
						  <form action="" method="post">
							<div class="form-group">
							  <p id="odemetur-kredikart" style="float:left; " > </p>   <p>  &nbsp; İle Ödemeyi Seçtiniz...</p>
							  <p id="kredikarti_odeme_toplam"> <?php echo $toplam ?> </p>
							</div>
							<div class="form-group">
							  <input type="text" class="form-control" name="kredikarti_ad_soyad" id="kredikarti_ad_soyad"  placeholder="Kart Sahibinin Adı Soyad"/>
							</div>
							
							<div class="form-group">
							  <input type="text" class="form-control" name="kredikart_numarasi" id="kredikart_numarasi"  onkeypress="return isNumberKey(event)" placeholder="Kart Numarası "/>
							</div>
							
							<div class="form-group">
							  <input type="text" class="form-control" name="kredikart_ay" id="kredikart_ay" maxlength="2" onkeypress="return isNumberKey(event)"  style="width:45px; float:left;  margin-right:10px;" placeholder="Ay"/> 
							    <input type="text" class="form-control" name="kredikart_yıl" id="kredikart_yıl" maxlength="2" onkeypress="return isNumberKey(event)"  style="width:45px;   " placeholder="Yıl"/>
							</div>
							
							<div class="form-group">
							  <input type="text" class="form-control" name="kredikart_cvv" id="kredikart_cvv" onkeypress="return isNumberKey(event)" maxlength="3" style="width:60px;" placeholder="CVV"/>
							</div>
						  	
						  	<div class="form-group">
							  <textarea  class="form-control" name="kredikart_adres" id="kredikart_adres" rows="6" placeholder="Adres"></textarea> 
							</div>

						</div>
						<script type="text/javascript">
			  		
					  		 function isNumberKey(evt) 
					  		{
							    var charCode = (evt.which) ? evt.which : event.keyCode;
							    if (charCode > 31 && (charCode < 48 || charCode > 57))
							        return false;
							    return true;
							}
					  	</script>
						<div class="modal-footer">
							
						  	<button type="button" class="btn btn-secondary" id="kredikart_vazgec"   data-dismiss="modal">Vazgeç</button>
						  	<button type="submit" name="kredikart_odeme_bitir" name="kredikart_odeme_bitir" class="btn btn-primary">Ödemeyi Bitir</button>
						</div>
						</form>
					  </div>
					</div>
				</div>
				<div class="modal fade" id="kapida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title"  id="exampleModalLabel" style="font-size:20px; text-align:center">Ödeme Yap</h5>
						</div>
						<div class="modal-body">
						  <form action="" id="form_kapida" method="post">
							<div class="form-group">
							  <p id="odemetur-kapida" style="float:left; " > </p>  <p>yi &nbsp; Seçtiniz...</p>
							  <p id="kapida_odeme_toplam"> <?php echo $toplam ?> </p>
							</div>
							<div class="form-group">
							  <input type="text" class="form-control" name="kapida_ad_soyad" id="kapida_ad_soyad"  placeholder="Ad Soyad"/>
							</div>
							
						  	<div class="form-group">
							  <textarea  class="form-control" name="kapida_adres" id="kapida_adres" rows="6" placeholder="Adres"></textarea> 
							</div>

						</div>	
						
						<div class="modal-footer">
							
						  	<button type="button" class="btn btn-secondary" id="kapida_vazgec"  data-dismiss="modal">Vazgeç</button>
						  	<button type="submit" name="kapida_odeme_bitir" name="kapida_odeme_bitir" class="btn btn-primary">Ödemeyi Bitir</button>
						</div>
						</form>
					  </div>
					</div>
				</div>
				<div class="modal fade" id="sanalkart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title"  id="exampleModalLabel" style="font-size:20px; text-align:center">Ödeme Yap</h5>
						</div>
						<div class="modal-body">
						  <form action="" method="post">
							<div class="form-group">
							  <p id="odemetur-sanalkart" style="float:left; " > </p>  <p> &nbsp; İle Ödemeyi Seçtiniz...</p>
							  <p id="sanalkart_odeme_toplam"> <?php echo $toplam ?> </p>
							</div>
							<div class="form-group">
							  <input type="text" class="form-control" name="sanalkart_ad_soyad" id="sanalkart_ad_soyad"  placeholder="Ad Soyad"/>
							</div>
							
							<div class="form-group">
							  <input type="text" class="form-control" name="sanalkart_kart_numarası" id="sanalkart_kart_numarası"  onkeypress="return isNumberKey(event)" placeholder=" Sanal Kart Numarası "/>
							</div>
							
						  	<div class="form-group">
							  <textarea  class="form-control" name="sanalkart_adres" id="sanalkart_adres" rows="6" placeholder="Adres"></textarea> 
							</div>

						</div>
						
						<div class="modal-footer">
							
						  	<button type="button" class="btn btn-secondary"  id="sanalkart_vazgec" data-dismiss="modal">Vazgeç</button>
						  	<button type="submit" name="sanalkart_odeme_bitir" class="btn btn-primary">Ödemeyi Bitir</button>
						</div>
						</form>
					  </div>
					</div>
				</div>
				
					<?php
							 if (isset($_POST['kapida_odeme_bitir'])) 
							{
								
								$kisi=$_POST["kapida_ad_soyad"];
								$adres=$_POST["kapida_adres"];
								$odeme_tip="Kapıda Ödeme";
								$ekle=$db->prepare("insert into odeme set  sepet_id=?,odeme_tutar=?,odeme_tip=?,odeme_adres=?,odeme_kisi=?");
		                        $ekle->execute(array($_SESSION["id"],$son,$odeme_tip,$adres,$kisi));
		                        foreach ($sepet as $key => $value)
						 	{
						 		$value['sepet_id'];
						 		$urun=$db->query("select  * from urun where urun_id='".$value["sepet_urunid"]."'")->fetchAll(PDO::FETCH_ASSOC);
					 			foreach ($urun as $keys => $values)
					 			{

					 			$stok= $values['urun_stok']-1; 
					 			$guncelle2=$db->prepare("UPDATE urun SET urun_stok=? WHERE urun_id=?");
		                        $guncelle2->execute(array($stok,$values['urun_id']));
								}
					  		}
		                        $guncelle=$db->prepare("UPDATE sepet SET sepet_durum=? WHERE sepet_uyeid=?");
		                        $guncelle->execute(array(1,$_SESSION["id"])); 
		                        $hata = $ekle->errorInfo();
		          				if(true){header ("Location:index_kullanici.php");} 
		                    	
							}

							if (isset($_POST['kredikart_odeme_bitir'])) 
							{
								
								$kisi=$_POST["kredikarti_ad_soyad"];
								$adres=$_POST["kredikart_adres"];
								$odeme_tip="Kredi Kartı";
								$ekle=$db->prepare("insert into odeme set  sepet_id=?,odeme_tutar=?,odeme_tip=?,odeme_adres=?,odeme_kisi=?");
		                        $ekle->execute(array($_SESSION["id"],$son,$odeme_tip,$adres,$kisi));
		                        foreach ($sepet as $key => $value)
						 	{
						 		$value['sepet_id'];
						 		$urun=$db->query("select  * from urun where urun_id='".$value["sepet_urunid"]."'")->fetchAll(PDO::FETCH_ASSOC);
					 			foreach ($urun as $keys => $values)
					 			{

					 			$stok= $values['urun_stok']-1; 
					 			$guncelle2=$db->prepare("UPDATE urun SET urun_stok=? WHERE urun_id=?");
		                        $guncelle2->execute(array($stok,$values['urun_id']));
								}
					  		}
		                        $guncelle=$db->prepare("UPDATE sepet SET sepet_durum=? WHERE sepet_uyeid=?");
		                        $guncelle->execute(array(1,$_SESSION["id"])); 
		                        $hata = $ekle->errorInfo();
		          				if(true){header ("Location:index_kullanici.php");} 
		                    	
							}


							 if (isset($_POST['sanalkart_odeme_bitir'])) 
							{
								
								$kisi=$_POST["sanalkart_ad_soyad"];
								$adres=$_POST["sanalkart_adres"];
								$odeme_tip="sanalkart";
								$ekle=$db->prepare("insert into odeme set  sepet_id=?,odeme_tutar=?,odeme_tip=?,odeme_adres=?,odeme_kisi=?");
		                        $ekle->execute(array($_SESSION["id"],$son,$odeme_tip,$adres,$kisi));
								foreach ($sepet as $key => $value)
						 	{
						 		$value['sepet_id'];
						 		$urun=$db->query("select  * from urun where urun_id='".$value["sepet_urunid"]."'")->fetchAll(PDO::FETCH_ASSOC);
					 			foreach ($urun as $keys => $values)
					 			{

					 			$stok= $values['urun_stok']-1; 
					 			$guncelle2=$db->prepare("UPDATE urun SET urun_stok=? WHERE urun_id=?");
		                        $guncelle2->execute(array($stok,$values['urun_id']));
								}
					  		}
		                        $guncelle=$db->prepare("UPDATE sepet SET sepet_durum=? WHERE sepet_uyeid=?");
		                        $guncelle->execute(array(1,$_SESSION["id"])); 
		                        $hata = $ekle->errorInfo();
		          				if(true){header ("Location:index_kullanici.php");} 
		                    	
							}
					?>

					
			


				
	<!--footer kısmını çagırıyoruz-->
	<?php require_once("footer.php"); ?>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>