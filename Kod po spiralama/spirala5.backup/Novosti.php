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
						<li id="ajax_otvaranje_stranice" onclick="ucitavanje_stranice_ajax('Novosti.php)" >  <a href="#"> Naslovnica    </a> </li>
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
						<li id="ajax_otvaranje_stranice" onclick="ucitavanje_stranice_ajax('kontakt.php')" > <a href="#"> Kontakt </a> </li>
						<li > <a href="#" onclick="ucitavanje_stranice_ajax('Admin_panel.php')"> LogIn    </a></li>
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
		<div class="obavjesti">
			<article class="obavjest">
				<div class="slika"><img src="Slike_knjiga/18.jpg" align="left"></div>
				<div class="tekst">
					<h2>Orhanovo nasljedje</h2>
					<p>Seleći se iz posljednjih godina Otomanskog carstva u 1990-e, Orhanovo nasljedje je priča o strasnoj ljubavi, neopisivim užasima, nevjerovatnoj žilavosti i prećutanim pričama koje proganjaju porodicu</p>
					<a href="#">Detaljnije...</a>
				</div>
			</article>
		</div>
		<!--  
		<div class="obavjesti">
			<article class="obavjest">
				<div class="slika"><img src="Slike_knjiga/19.jpg" align="left"></div>
				<div class="tekst">
					<h2>Istočno od raja</h2>
					<p>Džon Stajnbek, Dobitnik Nobelove nagrade.Delo biblijskih razmera jednog od najvećih američkih pisaca.</p>
					<a href="#">Detaljnije...</a>
				</div>
			</article>
		</div>
		
		<div class="obavjesti">
			<article class="obavjest">
				<div class="slika"><img src="Slike_knjiga/20.jpg" align="left"></div>
				<div class="tekst">
					<h2>Anđeo čuvar</h2>
					<p>Očaravajuća priča o traganju za oproštajem grehova iz prošlosti i o veri u sopstvenu budućnost.</p>
					<a href="#">Detaljnije...</a>
				</div>
			</article>
		</div>
		-->
		
		<div class="obavjesti_php">
			
			<?php 
			$detaljnije1="";
			$vrijemenov="";
			$autornov="";
			$naslovnov="";
			$slikanov="";
			$tekstnov="";
					$veza = new PDO("mysql:dbname=wtp;host=localhost;charset=utf8", "edis", "1111");
					$veza->exec("set names utf8");
					$rezultat = $veza->query("select id, autor, naslov, slika, UNIX_TIMESTAMP(vrijeme) vrijeme1, detaljnije from vijesti order by vrijeme desc");
					if (!$rezultat){
						$greska = $veza->errorInfo();
						print "SQL greška: " . $greska[2];
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
							$detaljnije="<a onclick=\"ucitavanje_stranice_ajax('detaljnijenovosti.php?vrijeme=$vrijemenov&autor=$autornov&naslov=$naslovnov&opis=$tekstnov&slika=$slikanov&id=$idnov');\" >Opsirnije...</a>";
					 		echo '<div class="obavjesti"> <article class="obavjest">
					 			<div class="slika"><img src = "'.$slikanov.'" align="left"></div>
					 			<div class="tekst">'.$vrijemenov.'<br>'.$autornov.'<br>'.$naslovnov.'<br>'.$detaljnije.'</div>
								</article> </div>';
					 	}
					?>
			
			<!--  
		</div>
		<div class="obavjesti">
			<article class="obavjest">
				<div class="slika"><img src="Slike_knjiga/20.jpg" align="left"></div>
				<div class="tekst">
					<h2>Anđeo čuvar</h2>
					<p>Očaravajuća priča o traganju za oproštajem grehova iz prošlosti i o veri u sopstvenu budućnost.</p>
					<a href="#">Detaljnije...</a>
				</div>
			</article>
		</div>
			-->
		
		<div><p>   </p></div>
		<div class="dno">&copy; Edis Kunić Projekat za Predmet Web Tehnologije</div>
		
	</body>
</html>