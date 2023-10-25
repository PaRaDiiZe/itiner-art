document.getElementById("filtre").addEventListener("change", function () {
    var categorie = this.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultats").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "oeuvre/?categorie=" + categorie, true);
    xmlhttp.send();
});