
window.onload = function () {
    waktu();
}

function waktu() {
    var waktu = document.getElementById("time");
    var d = new Date(), h, m, s;
    var h = d.getHours();
    var m = set(d.getMinutes());
    var s = set(d.getSeconds());
    
    waktu.innerHTML = h + ':' + m + ':' + s;

    setTimeout("waktu()", 1000);
   
}

function set(waktu) {
    waktu = waktu < 10 ? '0' + waktu : waktu;
    return waktu;
}

// setInterval(refreshTime, 1000);
