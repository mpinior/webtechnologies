var liczbaPlikow=1;
const MAX_LICZBA = 8;

function data(){
    var data = new Date();
    
    var dzien = data.getDate();
    if (dzien<10) dzien="0"+dzien;

    var miesiac = data.getMonth()+1;
    if (miesiac<10) miesiac="0"+miesiac;

    var rok = data.getFullYear();

    var godzina = data.getHours();
    if (godzina<10) godzina="0"+godzina;

    var minuta = data.getMinutes();
    if(minuta<10) minuta="0"+minuta;

    document.getElementById("data").value = rok+"-"+miesiac+"-"+dzien;
    document.getElementById("czas").value = godzina+":"+minuta;
}

function verifyDate(){
	var WpisanaData = document.getElementById('data').value;
    var regex = /^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/gi;
    var dateFromElement = new Date(WpisanaData);
    if (!regex.test(WpisanaData) || dateFromElement >= new Date()) {
        data();
    }
    var WpisanyCzas = document.getElementById('czas').value;
    var regex = /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/gi;
    var dateFromElement = new Date(WpisanaData +":"+ WpisanyCzas);
    if (!regex.test(WpisanyCzas) || dateFromElement >= new Date()) {
        data();
    }
}

function addFiles(){
    if (liczbaPlikow< MAX_LICZBA){
        liczbaPlikow++; 
        let nowyPrzycisk = document.createElement('input');
        nowyPrzycisk.setAttribute("type", "file");
        nowyPrzycisk.setAttribute("name", "file" + liczbaPlikow);
        nowyPrzycisk.setAttribute("onclick", "nextAttachment()");
        let nowaLinia = document.createElement('br'); 
        let pliki = document.getElementById("pliki");
        pliki.appendChild(nowyPrzycisk);
        pliki.appendChild(nowaLinia);
	}

}
