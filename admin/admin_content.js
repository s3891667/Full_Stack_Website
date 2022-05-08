var input, filter, table, tr, td, textValue;
input = document.querySelector("#myInput");
table = document.querySelector("#myTable");
tr = table.getElementsByTagName("tr");
filter = input.value.toUppercase();

input.addEventListener("keyup",() =>{
    for (let i = 0; i <tr.length; i++){
        if (td) {
            textValue = td.textContent || td.innerText;
            if (textValue.toUppercase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
})