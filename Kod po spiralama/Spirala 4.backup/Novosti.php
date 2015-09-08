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
		<div class="obavjest_naslov"> 
			<p><center>Nove knjige</center></p>
		</div> 
		<div class="obavjesti">
			<article class="obavjest">
				<div class="slika"><img src="Slike_knjiga/18.jpg" align="left"></div>
				<div class="tekst">
					<h2>Orhanovo nasljedje</h2>
					<p>Seleći se iz posljednjih godina Otomanskog carstva u 1990-e, Orhanovo nasljedje je priča o strasnoj ljubavi, neopisivim užasima, nevjerovatnoj žilavosti i prećutanim pričama koje proganjaju porodicu</p>
				</div>
			</article>
		</div>
		
		<div class="obavjesti">
			<article class="obavjest">
				<div class="slika"><img src="Slike_knjiga/19.jpg" align="left"></div>
				<div class="tekst">
					<h2>Istočno od raja</h2>
					<p>Džon Stajnbek, Dobitnik Nobelove nagrade.Delo biblijskih razmera jednog od najvećih američkih pisaca.</p>
				</div>
			</article>
		</div>
		
		<div class="obavjesti">
			<article class="obavjest">
				<div class="slika"><img src="Slike_knjiga/20.jpg" align="left"></div>
				<div class="tekst">
					<h2>Anđeo čuvar</h2>
					<p>Očaravajuća priča o traganju za oproštajem grehova iz prošlosti i o veri u sopstvenu budućnost.</p>
				</div>
			</article>
		</div>
		
		<div class="obavjesti_php">
			<?php 
				$fajloviNovosti = glob("Novosti1/*.txt");
				$niz = array();
				//var_dump($fajloviNovosti);
				/*ucitavamo novosti iz fajlova i punimo niz*/
				foreach ($fajloviNovosti as $fajl) 
				{
					$sadrzaj = file($fajl);
					array_push($niz, $sadrzaj);
				}
					 	foreach ($fajloviNovosti as $file) 
					 	{
					 		$sadrzaj = file($file);
					 		$opisNovosti = "";
					 		$detaljanOpisNovosti = "";
					 		$bool = false;

					 		for($i = 4; $i < count($sadrzaj); $i++)
					 		{
					 			if($sadrzaj[$i] === "--\r\n")
					 			{
					 				$bool = true;
					 				continue;
					 			}
					 			if($bool == false)
					 			{
					 				$opisNovosti .= trim($sadrzaj[$i]);
					 			}
					 			else if ($bool == true)
					 			{
					 				$detaljanOpisNovosti .= trim($sadrzaj[$i]);
					 			}
					 		}
							/* deklaracija varijabli*/
					 		$vrijeme = "";
					 		$autor = "";
					 		$naslov = "";
					 		$slika = "";
					 		/*punjenje varijabli*/
					 		$vrijeme = trim($sadrzaj[0]);
					 		$autor = trim($sadrzaj[1]);
					 		$naslov = trim(ucfirst(strtolower($sadrzaj[2])));
					 		$slika = trim($sadrzaj[3]);
							/*ispis */
					 		echo ' <div class="obavjesti"> <article class="obavjest">
					 			<div class="slika"><img src = "'.$slika.'" align="left"></div>
					 			<div class="tekst">'.$vrijeme.'<br>'.$autor.'<br>'.$naslov.$opisNovosti.'</div>
								</article> </div>';
					 	}
					?>
			
			
			
			<div class="obavjesti">
			<article class="obavjest">
				<div class="slika"><img src="Slike_knjiga/20.jpg" align="left"></div>
				<div class="tekst">
					<h2>Anđeo čuvar</h2>
					<p>Očaravajuća priča o traganju za oproštajem grehova iz prošlosti i o veri u sopstvenu budućnost.</p>
				</div>
			</article>
		</div>
			
		</div>
		
		<div><p>   </p></div>
		<div class="dno">&copy; Edis Kunić Projekat za Predmet Web Tehnologije</div>
	
	</body>
</html>