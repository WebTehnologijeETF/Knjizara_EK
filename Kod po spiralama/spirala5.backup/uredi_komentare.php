<?PHP
	$id_novosti="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$id_novosti=$_POST["id_novosti"];
		if(!empty($_POST["id_novosti"])){
			$veza = new PDO("mysql:dbname=wtp;host=localhost;charset=utf8", "edis", "1111");
			$veza->exec("set names utf8");
			$rezultat = $veza->query("DELETE FROM komentari WHERE id = $id_novosti");
			if (!$rezultat) {
				print "baza problem: uredi_komentare";
				exit();
			}else{
				print "ok";
			}
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
		<meta http-equiv="Content-Type" content="text/html ; charset=utf-8">
		<link rel="stylesheet" href="Stilovi/stil.css" type="text/css" >
		<title>Knjizara</title>
</head>
<body> <div class="zaglavlje">
				
				<img src="Slike/1.png">
				
				<div class="navigacija">
					<ul>
						<li id="ajax_otvaranje_stranice" onclick="ucitavanje_stranice_ajax('Glavna.html')" >  <a href="#"> Naslovnica    </a> </li>
						<li id="ajax_otvaranje_stranice" onclick="ucitavanje_stranice_ajax('Knjige.html')" > <a href="#"> Knjige   </a> </li>
						<li > <a href="#"> Knjige žarn </a> <span class="strelica">&#9660;</span>
							<ul class="pod_meni">
								<li> <a href="#"> Fantazija </a> </li>
								<li> <a href="#"> Ljubavne </a> </li>
								<li> <a href="#"> Drama </a> </li>
								<li> <a href="#"> Horor </a> </li>
								<li> <a href="#"> Sport </a> </li>
								<li> <a href="#"> Nauka </a> <span class="strelica_l">&#9654;</span>
									<ul class="pod_meni_2">
										<li> <a href="#">Priroda</a> </li>
										<li> <a href="#">Tehničke n. </a> </li>
										<li> <a href="#">Medicina</a> </li>
										<li> <a href="#">Poljoprivreda</a> </li>
										<li> <a href="#">Društvene n</a> </li>
										<li> <a href="#">Humanističke n.</a> </li>
									</ul>
								</li>
							</ul>
						</li>
						<li id="ajax_otvaranje_stranice" onclick="ucitavanje_stranice_ajax('Linkovi.html')"> <a href="#"> Linikovi </a> </li>
						<li id="ajax_otvaranje_stranice" onclick="ucitavanje_stranice_ajax('Kontakt.html')" > <a href="#"> Kontakt </a> </li>
					</ul>
				</div>
			</div> 
			<div class="omotac"> 
			<p><center> Ideje koje su mi promjenile život dobila sam čitajući. – Bel Huks</center></p>
			<div class="main">
				<img src="Slike/Books.jpg">
			</div>
		</div> 
		<div class="obavjest_naslov"> 
			<p><center>Nove knjige</center></p>
		</div> 
		<form id="forma_za_brisanje_novosti" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Unesite ID komentara koji zelite brisati:
			<input type="text" name="id_novosti" id="id_novosti">
			<br>
		
		 <input type="submit" value="Posalji" />
		</form>
	<?PHP	
	$kontrola_komentari = isset($_GET['kontrola_komentari']) ? $_GET['kontrola_komentari'] : '';
			$vrijemenov="";
			$autornov="";
			$naslovnov="";
			$slikanov="";
			$tekstnov="";
	if($kontrola_komentari){
					$veza = new PDO("mysql:dbname=wtp;host=localhost;charset=utf8", "edis", "1111");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, UNIX_TIMESTAMP(vrijeme) vrijeme, tekst , autor from komentari");
					if (!$rezultat) {
						print "baza problem: uredi komentare.php";
						exit();
					}
					;
					
				foreach ($rezultat as $file) 
				{
					
					$vrijeme_komentar = date("d.m.Y. H:i:s",$file['vrijeme']);
					$autor_komentar = $file['autor'];
					$tekst_komentar = $file['tekst'];
					$id_komentar = $file['id'];
					 echo '<div class="komentari">
					    <div class="vrijeme"> Vrijeme postavljanja komentara: '.$vrijeme_komentar.'</div>
					 	<div class="autor"> Autor: '.$autor_komentar.'</div>
						<div class="tekst_komentara"> Komentar: '.$tekst_komentar.'</div>
						<div>Id novosti: '.$id_komentar.'</div>
						</div>';
				}
		
	}
	
	?>
		
</BODY>
</HTML>