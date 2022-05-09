var input, filter, table, tr, td, i, txtValue;
function myFunction() {
    // Declare variables
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    //firstname case
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        } 
    }
    //lastname case
    /*for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            break;
        }
    }
    //email case
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            break;
        }
    }*/
}

function loadXMLDoc() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            readFunction(this);
        }
    };
    xmlhttp.open("GET", "../accounts.xml", true);
    xmlhttp.send();
}
function readFunction(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var table = "<tr><th>Firstname</th><th>Lastname</th><th>Password</th><th>Email</th><th>Date</th><th>Time</th></tr>";
    var x = xmlDoc.getElementsByTagName("user");
    for (i = 0; i < x.length; i++) {
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
    document.getElementById("myTable").innerHTML = table;
}
