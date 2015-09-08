<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
		<meta http-equiv="Content-Type" content="text/html ; charset=utf-8">
		<link rel="stylesheet" href="Stilovi/stil.css" type="text/css" >
		<script src="java_script.js"></script>
		<title>Knjizara</title>
</head>
	<body> 
			<div class="zaglavlje">
				
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
			<?php 
			include 'dodaj_komentar.php';
				$vrijeme = isset($_GET['vrijeme']) ? $_GET['vrijeme'] : '';
				$autor = isset($_GET['autor']) ? $_GET['autor'] : '';
				$naslov= isset($_GET['naslov']) ? $_GET['naslov'] : '';
				$slika = isset($_GET['slika']) ? $_GET['slika'] : '';
				$opis = isset($_GET['opis']) ? $_GET['opis'] : '';
				$id = isset($_GET['id']) ? $_GET['id'] : '';
				$id_vijesti_za_komentar=isset($_GET['id']) ? $_GET['id'] : '';
				echo '<div class="obavjesti"> <article class="obavjest">
					 			<div class="slika"><img src = "'.$slika.'" align="left"></div>
					 			<div class="tekst">'.$vrijeme.'<br>'.$autor.'<br>'.$naslov.'<br>'.$opis.'</div>
								</article> </div>';
								
				$veza = new PDO("mysql:dbname=wtp;host=localhost;charset=utf8", "edis", "1111");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, UNIX_TIMESTAMP(vrijeme) vrijeme, tekst , autor from komentari where vijesti=".$id." order by vrijeme desc");
					if (!$rezultat) {
						print "baza problem: detaljnenovosti.php";
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
						</div>';
				}
				
					echo '
						
						<div><p>   </p></div>';?>
						<form id="forma_za_komentare" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<?php
							echo '<p>Forma za dodavanje komentara<p>
							<input id = "id" name ="id" value = "'.$id.'" type = "hidden">
							<p>Ime:</p>
							<input type="text" name="autor_kom" id="autor_kom
							" class="input" />
							<p>Komentar: </p>
						  <textarea name="komentar_kom" id="komentar_kom
						  " class="input" rows="4" cols="40" placeholder="Tekst komentara"></textarea>
						  <p><button type="submit">Postavi komentar</button></p>';?>
						  
						</form>
						
						
						
				
		<div><p>   </p></div>
		<div class="dno">&copy; Edis Kunić Projekat za Predmet Web Tehnologije</div>
	
	</body>
</html>