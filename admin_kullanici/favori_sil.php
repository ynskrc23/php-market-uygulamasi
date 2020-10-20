<?php require_once("../baglan.php"); ?>
<?php
if (!isset($id)) {
		$id = $_GET['id'];
	}
?>
<!--PHP SİLME İŞLMEİ -->
<?php	
	$veri = $db->prepare("DELETE FROM begeni WHERE begeni_id = :id");
	$delete = $veri->execute(array('id' => $_GET['id']));
	header("Location:kullanici_favori.php");
?>
<!--PHP SİLME İŞLMEİ -->