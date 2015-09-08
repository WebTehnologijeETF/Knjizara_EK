function da_li_je_prazno(){		
/* funkcija za validaciju preko javascript zadana u siprali 2*/
	var kontrola1=false;
	var kontrola2=false;
	var kontrola3=false;

	if(document.getElementById('ime').value==""){
		document.getElementById('ime').style.background="rgba(241, 159, 156, 0.62)";
		document.getElementById('ime_slika').style.display="inline";
		kontrola1=true;
	}
	else{
		document.getElementById('ime').style.background="transparent";
		document.getElementById('ime_slika').style.display="none";
	}
	if(document.getElementById('prezime').value==""){
		document.getElementById('prezime').style.background="rgba(241, 159, 156, 0.62)";
		document.getElementById('prezime_slika').style.display="inline";
		kontrola2=true;
	}
	else{
		document.getElementById('prezime').style.background="transparent";
		document.getElementById('prezime_slika').style.display="none";
	}
	if(document.getElementById('email').value==""){
		document.getElementById('email').style.background="rgba(241, 159, 156, 0.62)";
		document.getElementById('email_slika').style.display="inline";
		kontrola3=true;
	}
	else{
		document.getElementById('email').style.background="transparent";
		document.getElementById('email_slika').style.display="none";
		
	}
	if(kontrola1==true || kontrola2== true || kontrola3==true){
		document.getElementById('napomena').style.visibility="visible";
	}else{
		document.getElementById('napomena').style.visibility="hidden";
	}
	regex_validacija();
	return false;
}
function regex_validacija(){
	var reg= /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; 
	var adresa=document.getElementById('email').value;
	if(reg.test(adresa)== false){
		document.getElementById('email').style.background="rgba(241, 159, 156, 0.62)";
		document.getElementById('email_slika').style.display="inline";
	}else{
		document.getElementById('email_slika').style.display="inline";
		document.getElementById('email_slika').style.display="none";
	}
}


