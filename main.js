let hibaNev = true;
let hibaFajta = true;
let hibaAr = true;
let hibaKal = true;
let hibaLej = true;
function getnamelength() {
    let hossz = document.getElementById("nev").value.length;
    if (hossz >45) {
        document.getElementById("errorName").innerHTML = "A név nem lehet 45 karakternél hosszabb";
        document.getElementById("errorName").classList.add("red"); 
        hibaNev = true;
    }
    else {
        document.getElementById("errorName").classList.remove("red"); 
        document.getElementById("errorName").innerHTML ="";
        hibaNev = false;
    }
}
function gettypelength() {
    let hossz = document.getElementById("fajta").value.length;
    if (hossz >45) {
        document.getElementById("errorType").innerHTML = "A leírás nem lehet 45 karakternél hosszabb";
        document.getElementById("errorType").classList.add("red"); 
        hibaFajta = true;
    }
    else {
        document.getElementById("errorType").classList.remove("red"); 
        document.getElementById("errorType").innerHTML =hossz+"/45";
        hibaFajta = false;
    }
}
function notnegativP() {
    if (document.getElementById("ar").value < 0) {
        document.getElementById("errorPrice").innerHTML = "Az ár nem lehet negatív";
        document.getElementById("errorPrice").classList.add("red"); 
        hibaAr = true;
    }
    else {
        document.getElementById("errorPrice").innerHTML = ""; hibaAr = false;
        document.getElementById("errorPrice").classList.remove("red"); }
}
function notnegativC() {
    if (document.getElementById("kal").value < 0) {
        document.getElementById("errorCal").innerHTML = "A kalória nem lehet negatív";
        document.getElementById("errorCal").classList.add("red"); 
        hibaKal = true;
    }
    else {
        document.getElementById("errorCal").innerHTML = ""; hibaKal = false;
        document.getElementById("errorCal").classList.remove("red"); }
}
function uod() {
    if (document.getElementById("lej").value == 0 || document.getElementById("lej").value == '0' || document.getElementById("lej").value == null) {
        document.getElementById("errorDate").innerHTML = "A lejárati dátumot nem lehet nulla";
        hibaLej = true;
    }
    else{
        document.getElementById("errorDate").innerHTML = ""; hibaLej = false;
        document.getElementById("errorDate").classList.remove("red"); 
    }
}
function send() {
    if (!(hibaNev || hibaFajta || hibaAr || hibaKal || hibaLej)) {
        alert("Sikeres felvétel"); return true; 
    }
    else return false;
}
function init() {
    document.getElementById("nev").addEventListener("input", getnamelength);
    document.getElementById("fajta").addEventListener("input", gettypelength);
    document.getElementById("ar").addEventListener("input", notnegativP);
    document.getElementById("kal").addEventListener("input", notnegativC);
    document.getElementById("lej").addEventListener("change", uod);
    document.getElementById("ujgomb").addEventListener("click", send);
    document.getElementsByTagName("form")[0].addEventListener("submit", (e)=> {
        if (!send) {
            e.preventDefault();
        }
    });
    document.addEventListener("keydown", (e) => e.stopPropagation());
}
document.addEventListener("DOMContentLoaded", init);