<?PHP
	$pass = $user_name=$pass_baz= $username_baza = "";
	$kontrola=false;
	$obavjest="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$veza = new PDO("mysql:dbname=wtp;host=localhost;charset=utf8", "edis", "1111");
		$veza->exec("set names utf8");
		$rezultat = $veza->query("select password, user_name from admin ");
		if (!$rezultat) {
			print "baza problem: admin_panel.php";
			
		}
		$pass=$_POST["pass"];
		$user_name=$_POST["user_name"];
		foreach ($rezultat as $file) 
			{
			$pass_baza= $file['password'];
			$username_baza= $file['user_name'];
			
			if($pass_baza==$pass && $username_baza==$user_name){
				$kontrola=true;
			}else{
				$kontrola=false;
			}
		}
		$otvori_novosti="<a onclick=\"ucitavanje_stranice_ajax('uredi_novosti.php?kontrola_novosti=$kontrola');\" >Idi na novosti</a>";
		$otvori_komentare="<a onclick=\"ucitavanje_stranice_ajax('uredi_komentare.php?kontrola_komentari=$kontrola');\" >Idi na komentare</a>";
		if($kontrola){
			echo '<div>"'.$otvori_novosti.'"</div>
				 <div>"'.$otvori_komentare.'"</div>';
		}else{
			echo 'Invalid username or password';
		}
		
	}
	$id_komentara_za_brisanje;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
		<meta http-equiv="Content-Type" content="text/html ; charset=utf-8">
		<link rel="stylesheet" href="Stilovi/stil.css" type="text/css" >
		<script src="java_script.js"></script>
		<title>Knjizara</title>
</head>
<body> 

<form class="forma_za_admina" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			User name:
			<input type="text" name="user_name" id="user_name">
			Password: 
			<input type="text" name="pass" id="pass">
			<br>
			<br id="prezime" name="prezime"  value="<?php
					if(isset($_REQUEST['obavjest']))
					print $_REQUEST['obavjest'];
					?>" /> <span><?php echo $obavjest ?></span>
		 <input type="submit" value="Posalji" />
		</form>
	<?PHP	/*
			$vrijemenov="";
			$autornov="";
			$naslovnov="";
			$slikanov="";
			$tekstnov="";
	if($kontrola){
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
							
					 		echo '<div class="obavjesti"> <article class="obavjest">
					 			<div class="slika"><img src = "'.$slikanov.'" align="left"></div>
					 			<div class="tekst">'.$vrijemenov.'<br>'.$autornov.'<br>'.$naslovnov.'</div>
								<div>Id novosti: '.$idnov.'</div>
								</article> </div>';
					 	}
						
		
	}*/
	
	?>
		
</BODY>
</HTML>