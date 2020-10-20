<?php require_once("baglan.php"); ?>

<?php 
    if($_SESSION){               
         $_SESSION["uye"];        
    }
?>  
<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>reyon | ürün</h2>
			<div class="panel-group category-products" id="accordian">
				<?php	
					$ustkategorilist= $db->query("select * from kategori where kategori_ust=0")->fetchAll(PDO::FETCH_ASSOC);
					$altkategorilist= $db->query("select * from kategori")->fetchAll(PDO::FETCH_ASSOC);
				?>
				<?php 	
					foreach ($ustkategorilist as $key => $value)
						{
				?>	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $value['kategori_id'];?>" >
									<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										<?php echo $value['kategori_isim'];?>
								</a>
							</h4>
											
						<div id="<?php echo $value['kategori_id'];?>" class="panel-collapse collapse">										
						<div class="panel-body">							
						<ul>
						<?php
							foreach ($altkategorilist as $keys => $values){
								if ($values['kategori_ust']==$value['kategori_id']){ 
										$sayac=$values['kategori_id']; 
									?>		
									<li>												
										<?php echo "<a href='shop_kullanici.php?id=".$sayac."'>";?><?php echo $values['kategori_isim'];?></a>
									</li>
									<?php } ?>
									<?php } ?>
						</ul>
						</div>
						</div>	
						</div>
						</div>	
						<?php } ?>
			</div>	
			<!--reyon bitti-->

			<div class="brands_products"><!--brands_products-->
				<h2>firma </h2>
				
				<script src="js/jquery-3.4.0.min.js"  type="text/javascript"></script>
				 <form action="kullanici_ara.php" method="POST">
				<div class="panel-group category-products" id="accordian">
					<?php $il = $db->query("SELECT * FROM muh_iller where id='".$_SESSION["il"]."'")->fetchAll(PDO::FETCH_ASSOC); ?>
					<?php $ilce = $db->query("SELECT * FROM muh_ilceler where id='".$_SESSION["ilce"]."'")->fetchAll(PDO::FETCH_ASSOC); ?>

					<input class="form-control" type="text" name="konumbilgi" maxlength="100" id="message-text4" disabled="disabled"  placeholder="<?php foreach ($il as $key => $value) {echo $value['baslik'];}?>/<?php foreach ($ilce as $key => $value) {echo $value['baslik'];}?>" required/>	
					<br> 
					<?php $illist = $db->query("SELECT * FROM muh_iller")->fetchAll(PDO::FETCH_ASSOC); ?>
				     	<select id="il2" name="uye_il" class="form-control" required>
							<option> İl Seçiniz</option>
								<?php 
									foreach ($illist as $key => $value) {
									echo '<option value="'.$value['id'].'">'.$value['baslik'].'</option>';
								}
								?>
				      	</select>
				      	<br> 
				      	<select id="ilce2" name="uye_ilce" class="form-control" required>
							<script type="text/javascript"> 
					      			$(document).ready(function(){		      				
					      				$("#il2").change(function(){
					      					 	var ilid=$(this).val();
					      					 	$.ajax({
					      					 		type:"POST",
					      					 		url:"ajax.php",
					      					 		data:{"il2":ilid},
					      					 		success:function(e)
					      					 		{ 					 	
					      					 		  $("#ilce2").html(e);
					      					 		}
					      					 	});
					      				})
					      			});
					      	</script>
			      		</select> 
			      		<br>
			      		<button type="submit" name="btn_ara" >Ara</button>				
				</div>
				</form>	 
			
		</div><!--/brands_products-->
				



			<div class="price-range"><!--price-range-->
				<h2>Fiyat Aralığı</h2>
				<div class="well text-center">
					<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
					<b class="pull-left">1 TL</b> <b class="pull-right">999 TL</b>
				</div>
			</div><!--/price-range-->
						
			<div class="shipping text-center"><!--shipping-->
				<img src="images/home/shipping.jpg" alt="" />
			</div><!--/shipping--><br>
						
	</div>
</div>
