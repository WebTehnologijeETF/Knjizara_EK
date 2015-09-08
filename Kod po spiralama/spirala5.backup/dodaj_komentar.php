<?php
	$autor="";
	$komentar=""; 
	$id=""; 
	/*
	 if(empty($_POST['autor'])){
		  print "Unesite autora: ";
		  exit();
	  }else{*/
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	  
	$autor = $_POST["autor_kom"];
    $komentar = $_POST["komentar_kom"];
	$id=$_POST["id"];
	$today = date("d.m.Y. H:i:s"); 
	
	
	$veza = new PDO("mysql:dbname=wtp;host=localhost;charset=utf8", "edis", "1111");
	$veza->exec("set names utf8");
	 
	 $rezultat = $veza->query
	 ("INSERT INTO komentari SET vijesti=".$id.",vrijeme='".$today."', tekst='".$komentar."',autor='".$autor."'");
	$rezultat = @mysql_query($query);
	 if (!$rezultat) {
		print "neuspjenso dodavanje komentara u bazu " ;
		exit();
		}
	
	}
?>