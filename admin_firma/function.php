<?php require_once("../baglan.php"); ?>
<!-- FİRMA ÜRÜN SİLME KOD  -->
<?php 
	if (!isset($id)) {
		$id = $_GET['id'];
	}	
	$sorgu= $db->query("SELECT * FROM urun where urun_id=$id")->fetch(PDO::FETCH_ASSOC);	
	unlink($sorgu["urun_resim"]);
	$veri = $db->prepare("DELETE FROM urun WHERE urun_id = :id");
	$delete = $veri->execute(array('id' => $_GET['id']));
	header("location:firma_ürün.php");	
?>
<!--FİRMA ÜRÜN SİLME KOD BİTTİ -->
