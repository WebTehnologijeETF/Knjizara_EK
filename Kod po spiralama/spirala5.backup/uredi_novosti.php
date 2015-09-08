<?PHP
	$id_novosti="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$id_novosti=$_POST["id_novosti"];
		if(!empty($_POST["id_novosti"])){
			$veza = new PDO("mysql:dbname=wtp;host=localhost;charset=utf8", "edis", "1111");
			$veza->exec("set names utf8");
			$rezultat = $veza->query("DELETE FROM vijesti WHERE id = $id_novosti");
			if (!$rezultat) {
				print "baza problem: uredi_novosti";
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
			Unesite ID novosti koju zelite obrisati:
			<input type="text" name="id_novosti" id="id_novosti">
			<br>
		
		 <input type="submit" value="Posalji" />
		</form>
	<?PHP	
	$kontrola_novosti = isset($_GET['kontrola_novosti']) ? $_GET['kontrola_novosti'] : '';
			$vrijemenov="";
			$autornov="";
			$naslovnov="";
			$slikanov="";
			$tekstnov="";
	if($kontrola_novosti){
					$veza = new PDO("mysql:dbname=wtp;host=localhost;charset=utf8", "edis", "1111");
					$veza->exec("set names utf8");
					$rezultat = $veza->query("select id, autor, naslov, slika, UNIX_TIMESTAMP(vrijeme) vrijeme1, detaljnije from vijesti order by vrijeme desc");
					if (!$rezultat){
						$greska = $veza->errorInfo();
						print "SQL greška: uredi_novosti baza";
						exit();
					}
					
					foreach ($rezultat as $file) 
					 	{
							$idnov= $file['id'];
					 		$vrijemenov = date("d.m.Y. H:i:s",$file['vrijeme1']);
					 		$autornov = $file['autor'];
					 		$naslovnov = $file['naslov'];
					 		$slikanov = $file['slika'];
							$tekstnov = $file['detaljnije'];
							
					 		echo '<div class="obavjesti"> <article class="obavjest">
					 			<div class="slika"><img src = "'.$slikanov.'" align="left"></div>
					 			<div class="tekst">'.$vrijemenov.'<br>'.$autornov.'<br>'.$naslovnov.'</div>
								<div>Id novosti: '.$idnov.'</div>
								</article> </div>';
					 	}
						
		
	}
	
	?>
		
</BODY>
</HTML>