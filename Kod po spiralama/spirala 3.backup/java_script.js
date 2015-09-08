function ucitavanje_stranice_ajax(_stranica){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200){
			document.open();
			document.write(ajax.responseText);
			document.close();
		}
		if (ajax.readyState == 4 && ajax.status == 404){
			alert("Greska ne psotoji URL");
		}
	}
	ajax.open("GET", _stranica, true);
	ajax.send();
}
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
	provjera_preko_servisa();
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

function provjera_preko_servisa(){
	var ajax = new XMLHttpRequest();
	var grad=document.getElementById("grad");
	var postanski_broj=document.getElementById("postanki_br");
	ajax.onreadystatechange = function()
	{
		if(ajax.readyState == 4 && ajax.status == 200)
		{
			if (ajax.responseText ==  "{"+'"ok"'+":"+'"Poštanski broj odgovara mjestu"'+'}') {
				document.getElementById('ajax_val').style.visibility="visible";
				document.getElementById('grad').style.background="transparent";
				document.getElementById('postanki_br').style.background="transparent";
			}
			else if(ajax.responseText=='{"greska":"Nepostojeće mjesto"}'){
					document.getElementById('grad').style.background="rgba(241, 159, 156, 0.62)";
					document.getElementById('ajax_val').style.visibility="hidden";
				
			}else{
				document.getElementById('postanki_br').style.background="rgba(241, 159, 156, 0.62)";
				document.getElementById('grad').style.background="rgba(241, 159, 156, 0.62)";
				document.getElementById('ajax_val').style.visibility="hidden";
			}
		}
	}
	ajax.open("GET", "http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto="+grad.value+"&postanskiBroj="+postanski_broj.value, true);
	ajax.send();
}


function ucitajtabelu_2() {
	var podaci=new XMLHttpRequest();
	podaci.onreadystatechange=function()
	{
        if (podaci.readyState == 4 && podaci.status == 200)
        {   
            var tekst=JSON.parse(podaci.responseText);
            var tabela=document.getElementById("tabela4");
			while(tabela.rows.length > 1) {
                  tabela.deleteRow(1);
			}
            for(var i=0; i<tekst.length; i++)
            {
				var red=tabela.insertRow();
				 
				var cell1 = red.insertCell(0);
				var cell2 = red.insertCell(1);
				var cell3 = red.insertCell(2);
				var cell4 = red.insertCell(3);
				var cell5 = red.insertCell(4);

               cell1.innerHTML = tekst[i].id;
               cell2.innerHTML = tekst[i].naziv;
               cell3.innerHTML = tekst[i].opis;
               cell4.innerHTML = '<img src="' + tekst[i].slika + '" alt="image">';
			   cell5.innerHTML = tekst[i].cijena;
            }
			if (red.readyState == 4 && red.status == 404){
				alert("Akcija iscitavanja: neuspjesna!");
			}
        }
    }
	podaci.open("GET", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16155", true);
    podaci.send();
}

function dodajred()
{
	if(document.getElementById("naziv_djela").value=="" ||
		document.getElementById("autor").value=="" ||
		document.getElementById("slika").value=="" ||
		document.getElementById("cijena").value=="" ){
		alert("Molimo unesite sve podatke.");
		retrun;
	}
	var naziv_djela=document.getElementById("naziv_djela").value;
	var autor=document.getElementById("autor").value ;
	var _slika=document.getElementById("slika").value ;
	var _cijena=document.getElementById("cijena").value;
	var redd={naziv:naziv_djela, opis:autor, slika:_slika, cijena:_cijena};
	
	if(isNaN(_cijena)==true){
		alert("uneiste ponovo cijenu");
		return;
	}
	var red= new XMLHttpRequest();
    red.onreadystatechange = function(event) {
        if (red.readyState == 4 && red.status == 200)
        {
            alert("Akcija dodavanja reda: Uspjesna!");
        }
		if (red.readyState == 4 && red.status == 404){
			alert("Akcija dodavanja reda: neuspjesna!");
		}
    }
    red.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16155", true);
    red.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	red.send("akcija=dodavanje&proizvod=" + JSON.stringify(redd)); 
	ucitajtabelu_2();
}

function obrisi_red()
{
	if(document.getElementById("id").value=="" ){
		alert("Molimo unesite ID.");
		retrun;
	}
	if(isNaN(_id)==true){
		alert("uneiste ponovo ID");
		return;
	}
	var _id=document.getElementById("id").value;
	var kandidat_za_brisanje = {id: _id}; 
	
	var naredba= new XMLHttpRequest();
    naredba.onreadystatechange = function(event) {
        if (naredba.readyState == 4 && naredba.status == 200)
        {
            alert("Akcija brsianja reda: Uspjesna!");
        }
		if (red.readyState == 4 && red.status == 404){
			alert("Akcija brisanja reda: neuspjesna!");
		}
    }
	naredba.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16155", true);
    naredba.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	naredba.send("akcija=brisanje&proizvod=" + JSON.stringify(kandidat_za_brisanje)); 
	ucitajtabelu_2();
}
function promjeni_red(){
	var _id=document.getElementById("id").value;
	var naziv_djela=document.getElementById("naziv_djela").value;
	var autor=document.getElementById("autor").value ;
	var _slika=document.getElementById("slika").value ;
	var _cijena=document.getElementById("cijena").value;
	var redd={id:_id, naziv:naziv_djela, opis:autor, slika:_slika, cijena:_cijena};
	
	if(isNaN(_id)==true){
		alert("uneiste ponovo ID");
		return;
	}
	if(isNaN(_cijena)==true){
		alert("uneiste ponovo cijenu");
		return;
	}	
	
	var objekt= new XMLHttpRequest();
		objekt.onreadystatechange = function(event) {
        if (objekt.readyState == 4 && objekt.status == 200)
        {
            alert("Akcija promjene reda: uspjesna!")
        }
		if (objekt.readyState == 4 && objekt.status == 404){
			alert("Akcija promjene reda: neuspjesna!");
		}
    }
    objekt.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16155", true);
    objekt.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	objekt.send("akcija=promjena&proizvod=" + JSON.stringify(redd)); 
	ucitajtabelu_2();
}



