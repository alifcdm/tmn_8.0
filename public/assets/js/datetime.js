function date_time(id) {

    date = new Date;
    tahun = date.getFullYear();
    bulan = date.getMonth();
    tanggal = date.getDate();
    hari = date.getDay();

    namabulan = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    namahari = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    h = date.getHours();
    if (h < 10) {
        h = "0" + h;
    }
    m = date.getMinutes();
    if (m < 10) {
        m = "0" + m;
    }
    s = date.getSeconds();
    if (s < 10) {
        s = "0" + s;
    }

    //susun dengan format baru
    result = namahari[hari] + ', ' + tanggal + ' ' + namabulan[bulan] + ' ' + tahun + ' / ' + h + ':' + m + ':' + s;
    document.getElementById(id).innerHTML = result;
    setTimeout('date_time("' + id + '");', '1000');
    return true;
}