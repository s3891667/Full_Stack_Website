var input, filter, table1, table2, tr1, tr2, td1, td2, i, txtValue, selector;
function myFunction() {
    // Declare variables
    selector = document.getElementById("filterType");
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table1 = document.getElementById("ascTable");
    table2 = document.getElementById("descTable");
    tr1 = table1.getElementsByTagName("tr");
    tr2 = table2.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    if (selector.value == "firstname") { //firstname case
        for (i = 0; i < tr1.length; i++) {
            td1 = tr1[i].getElementsByTagName("td")[0];
            td2 = tr2[i].getElementsByTagName("td")[0];
            if (td1) {
                txtValue = td1.textContent || td1.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr1[i].style.display = "";
                } else {
                    tr1[i].style.display = "none";
                }
            }
            if (td2) {
                txtValue = td2.textContent || td2.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr2[i].style.display = "";
                } else {
                    tr2[i].style.display = "none";
                }
            }
        }
    } else if (selector.value == "lastname") { //lastname case
        for (i = 0; i < tr1.length; i++) {
            td1 = tr1[i].getElementsByTagName("td")[1];
            td2 = tr2[i].getElementsByTagName("td")[1];
            if (td1) {
                txtValue = td1.textContent || td1.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr1[i].style.display = "";
                } else {
                    tr1[i].style.display = "none";
                }
            }
            if (td2) {
                txtValue = td2.textContent || td2.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr2[i].style.display = "";
                } else {
                    tr2[i].style.display = "none";
                }
            }
        }
    } else if (selector.value == "email") { //email case
        for (i = 0; i < tr1.length; i++) {
            td1 = tr1[i].getElementsByTagName("td")[3];
            td2 = tr2[i].getElementsByTagName("td")[3];
            if (td1) {
                txtValue = td1.textContent || td1.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr1[i].style.display = "";
                } else {
                    tr1[i].style.display = "none";
                }
            }
            if (td2) {
                txtValue = td2.textContent || td2.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr2[i].style.display = "";
                } else {
                    tr2[i].style.display = "none";
                }
            }
        }
    }
}

function menuFunction() {
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    btn.onclick = function () {
        sidebar.classList.toggle("active");
    }
}

function loadXMLDoc() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            readFunctionASC(this);
            readFunctionDESC(this);
        }
    }
    xmlhttp.open("GET", "../database/accounts.xml", true);
    xmlhttp.send();
}

function readFunctionASC(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var table = "<tr><th>Firstname</th><th>Lastname</th><th>Password</th><th>Email</th><th>Date</th><th>Time</th></tr>";
    var x = xmlDoc.getElementsByTagName("user");
    table += "<tr><td>" +
        x[0].getElementsByTagName("firstname")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("lastname")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("password")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("email")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("date")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("time")[0].childNodes[0].nodeValue +
        "</td></tr>";
    for (i = 1; i < x.length; i++) {
        table += "<tr><td>" +
            x[i].getElementsByTagName("firstname")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("lastname")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("password")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("time")[0].childNodes[0].nodeValue +
            "</td></tr>";

    }
    document.getElementById("ascTable").innerHTML = table;
}

function readFunctionDESC(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var table = "<tr><th>Firstname</th><th>Lastname</th><th>Password</th><th>Email</th><th>Date</th><th>Time</th></tr>";
    var x = xmlDoc.getElementsByTagName("user");
    table += "<tr><td>" +
        x[0].getElementsByTagName("firstname")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("lastname")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("password")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("email")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("date")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[0].getElementsByTagName("time")[0].childNodes[0].nodeValue +
        "</td></tr>";
    for (i = x.length - 1; i > 0; i--) {
        table += "<tr><td>" +
            x[i].getElementsByTagName("firstname")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("lastname")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("password")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("time")[0].childNodes[0].nodeValue +
            "</td></tr>";
    }
    document.getElementById("descTable").innerHTML = table;
}

