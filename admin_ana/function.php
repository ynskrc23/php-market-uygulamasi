<?php require_once("../baglan.php"); ?>
<?php
if (!isset($id)) {
		$id = $_GET['id'];
	}
?>
<!--PHP SİLME İŞLMEİ -->
<?php	
	$veri = $db->prepare("DELETE FROM uye WHERE uye_id = :id");
	$delete = $veri->execute(array('id' => $_GET['id']));
	header("Location:index.php");	
?>
<!--PHP SİLME İŞLMEİ -->