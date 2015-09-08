<?PHP
	$ime = $prezime = $email = $telefon = $komentar = $postanski_broj = "";
    $imebool = $prezime_bool = $email_bool = $telefon_bool = $poruka_bool = "";
    
     if($_SERVER["REQUEST_METHOD"] == "POST")
      {
             $valid = 1;
		
		if(empty($_POST["ime"])){
             $imebool = '<style type="text/css">
              #imeError {
              display: inline;
              visibility:visible;
              }
              </style>'; 
              $valid = 0; 
          }
          else{
    
               $ime = $_POST["ime"];
               if(!validiraj_ime($ime)){
                    $imebool = '<style type="text/css">
					#imeError {
					display: inline;
					visibility:visible;
					}
					</style>'; 
					$valid = 0;  
               }
          }
		  
		  
		  if(empty($_POST["prezime"])){
				$prezime_bool = '<style type="text/css">
				#prezimeError {
					display: inline;
					visibility:visible;
				}
				</style>'; 
				$valid = 0; 
          }
          else{
               $prezime = $_POST["prezime"];
               if(!validiraj_ime($prezime)){
					$prezime_bool = '<style type="text/css">
					#prezimeError {
						display: inline;
						visibility:visible;
					}
					</style>'; 
					$valid = 0;  
               }
          }
			if(empty($_POST["telefon"])){
				$imebool = '<style type="text/css">
				#telefonError {
					display: inline;
					visibility:visible;
				}
				</style>'; 
				$valid = 0; 
			}
			else{
    
               $ime = $_POST["telefon"];
               if(!validiraj_broj){
                    $imebool = '<style type="text/css">
					#telefonError {
						display: inline;
						visibility:visible;
					}
					</style>'; 
					$valid = 0;  
               }
          }
		  
		  if(empty($_POST["email"])){
             $email_bool = '<style type="text/css">
              #emailError {
              display: inline;
              visibility:visible;
              }
              </style>'; 
              $valid = 0; 
          }
          else{
    
               $ime = $_POST["email"];
               if(!validirajEmail($email))
               {
                    $email_bool = '<style type="text/css">
					#emailError {
						display: inline;
						visibility:visible;
					}
					</style>'; 
					$valid = 0;
               }
          }
	}
	
		function validirajEmail($email){
			$regexp = "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$";
			if(eregi($regexp,$email)) return 1;
			else return 0;
		}
		function validiraj_ime($ime){
			$regexp1 = "^[A-Z]'?[-a-zA-Z]([a-zA-Z])*$";
			if(eregi($regexp1,$name)) return 1;
			else return 0;
		}
		function validiraj_broj($telefon){
			if (!preg_match('/^[0-9]*$/', $id)) {
				return true;
			} else {
				return false;
			}
		}
	
?>
<!DOCTYPE HTML>
<html>

<head>
		<meta http-equiv="Content-Type" content="text/html ; charset=utf-8">
		<link rel="stylesheet" href="Stilovi/stil.css" type="text/css" >
		<title>Knjizara</title>
</head>
	<body> 
			<div class="zaglavlje">
			<div class="logo">
				<img src="Slike/1.png"/>
			</div>
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
			<form class="forma_1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<p id="napomena"> Crvena polja moraju biti unesena!</p>
				
				<div >	   
					<label> <span class="required"></span>Ime:  </label>
                    <input type="text" id="ime" name="ime" class="input1" value="<?php if(isset($_REQUEST['ime'])) print $_REQUEST['ime']; ?>" /> <span><?php echo $imebool ?></span>
                    <img src="Slike/error.png" id="imeError" />
				</div>
				
				<div >		   
					<label> <span class="required"></span>Prezime:  </label>
							<input type="text" id="prezime" name="prezime" class="input1" value="<?php
								if(isset($_REQUEST['prezime']))
								print $_REQUEST['prezime'];
								?>" /> <span><?php echo $prezime_bool ?></span>
                            <img src="Slike/error.png" id="prezimeError" />
				</div>
				
				<div >
					<label> <span class="required"></span>Telefon:    </label>
						<input type="text" id="telefon" name="Telefon" class="input1" value="<?php
								if(isset($_REQUEST['telefon']))
								print $_REQUEST['telefon'];
								?>" /> <span><?php echo $telefon_bool ?></span>
                            <img src="Slike/error.png" id="telefonError" />
					
				</div>
				<div >
				<label> <span class="required"></span>E-mail:   </label>
						<input type="text" id="email" name="email" class="input1" value="<?php
								if(isset($_REQUEST['email']))
								print $_REQUEST['email'];
								?>" /> <span><?php echo $email_bool ?></span>
                            <img src="Slike/error.png" id="emailError" />
				</div>
				<div id="text_poravanje">
					<label for="grad">Grad: </label>
					<input type="text" name="grad" id="grad">
				</div>
				<div>
					<label for="postanki_br">Poštanski br: </label>
					<input type="text" name="postanki_br" id="postanki_br">
				</div>
				<div>
					<label for="komentari">Komentari: </label>
					<textarea name="komentari" id="komentari" rows="5" cols="50"></textarea>
				</div>
				<input type="submit" value="Posalji" />
				<input type="reset" value="Poništi" />
			</form>
			<div class="dno">&copy; Edis Kunić Projekat za Predmet Web Tehnologije</div>
		
	<SCRIPT src="java_script.js"></SCRIPT>
	</body>
</html>