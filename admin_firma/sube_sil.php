<?php require_once("../baglan.php"); ?>
<!-- sube SİLME KOD  -->
<?php 
	if (!isset($id)) {
		$id = $_GET['id'];
	}	
	$sorgu= $db->query("SELECT * FROM sube where sube_id=$id")->fetch(PDO::FETCH_ASSOC);	
	unlink($sorgu["sube_reyon"]);
	$veri = $db->prepare("DELETE FROM sube WHERE sube_id = :id");
	$delete = $veri->execute(array('id' => $_GET['id']));
	header("location:firma_sube.php");
?>
<!--sube SİLME KOD BİTTİ -->
