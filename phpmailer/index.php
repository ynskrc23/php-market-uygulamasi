<?php 
	require_once("class.phpmailer.php"); 
  
	$smtpuser="ynskrc82@gmail.com";
	$smtphost="smtp.gmail.com";
	$smtpport="465";
	$smtppass="Qwen220.";

	if (isset($_POST["btn_mail"])) {

	  	$adsoyad = htmlspecialchars($_POST["adsoyad"]);
	  	$eposta = htmlspecialchars($_POST["eposta"]);
	 	$mesaj = htmlspecialchars($_POST["mesaj"]);
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = $smtphost;
		$mail->Port = $smtpport;
		$mail->SMTPSecure = 'ssl';
		$mail->Username = $smtpuser;
		$mail->Password = $smtppass;
		$mail->SetFrom($mail->Username, $adsoyad);
		$mail->AddAddress($smtpuser, $adsoyad);

		$mail->CharSet = 'UTF-8';
		$content = '
		<b>Websitenizden gelen iletişim maili</b><br>
		<table align="left" class="tg" style="undefined;table-layout: fixed; width: 535px">

			<tr>
				<td class="tg-031e">Ad Soyad: </td>
				<td class="tg-031e">:</td>
				<td class="tg-031e">'.$adsoyad.'</td>
			</tr>
			<tr>
				<td class="tg-031e">Eposta: </td>
				<td class="tg-031e">:</td>
				<td class="tg-031e">'.$eposta.'</td>
			</tr>
			<tr>
				<td class="tg-031e">Mesaj: </td>
				<td class="tg-031e">:</td>
				<td class="tg-031e">'.$mesaj.'</td>
			</tr>
		</table>';


		$mail->MsgHTML($content);
		if($mail->Send()) {
				header("Location:../index.php");
		} 
		else {
				header("Location:../index.php");
		}
	}


	if (isset($_POST["btn_kullanici_mail"])) {

	  	$adsoyad = htmlspecialchars($_POST["adsoyad"]);
	  	$eposta = htmlspecialchars($_POST["eposta"]);
	 	$mesaj = htmlspecialchars($_POST["mesaj"]);
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = $smtphost;
		$mail->Port = $smtpport;
		$mail->SMTPSecure = 'ssl';
		$mail->Username = $smtpuser;
		$mail->Password = $smtppass;
		$mail->SetFrom($mail->Username, $adsoyad);
		$mail->AddAddress($smtpuser, $adsoyad);

		$mail->CharSet = 'UTF-8';
		$content = '
		<b>Websitenizden gelen iletişim maili</b><br>
		<table align="left" class="tg" style="undefined;table-layout: fixed; width: 535px">

			<tr>
				<td class="tg-031e">Ad Soyad: </td>
				<td class="tg-031e">:</td>
				<td class="tg-031e">'.$adsoyad.'</td>
			</tr>
			<tr>
				<td class="tg-031e">Eposta: </td>
				<td class="tg-031e">:</td>
				<td class="tg-031e">'.$eposta.'</td>
			</tr>
			<tr>
				<td class="tg-031e">Mesaj: </td>
				<td class="tg-031e">:</td>
				<td class="tg-031e">'.$mesaj.'</td>
			</tr>
		</table>';


		$mail->MsgHTML($content);
		if($mail->Send()) {
				header("Location:../index_kullanici.php");
		} 
		else {
				header("Location:../index_kullanici.php");
		}
	}

	exit;

?>