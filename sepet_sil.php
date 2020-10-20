<?php require_once("baglan.php"); ?>

<?php

if (!isset($id)) {
		$id = $_GET['id'];
		$uye_id=$_GET['uye_id'];
	}	
	
	
	$sil=$db->prepare("delete  from sepet  where sepet_urunid=:id and sepet_uyeid=:uye_id");
    
      $delete = $sil->execute(array('id' => $_GET['id'],'uye_id' => $_GET['uye_id']));
	header("location:cart.php");	


?>