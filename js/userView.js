var dataFromDB = [
[1, 'Biblioteca P1', 20, 35, 17, new Date('2017-03-09 17:52')],
[2, 'Cafeteria', 23, 34, 28, new Date('2017-03-08 13:33')],
[3, 'Aula', 22, 33, 49, new Date('2017-03-10 09:55')]
];

window.onload = function() {
    this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){
    fillTable();
    fillSelect();

    document.getElementById("sort").addEventListener("change", sortTable);
    var a = document.getElementsByClassName("delete");
    for (i=0; i<a.length; i++){
        a[i].addEventListener("click", deleteRow);
    }
}


/*DIRECT METHODS*/
function sortTable(){
    if (document.getElementById("sort").value != ""){
        sortData(document.getElementById("sort").value - 1);
    }
}

function fillTable(){
    dataFromDB.forEach(function(item){
        var table = document.getElementById('data').getElementsByTagName('tbody')[0];
        var row = table.insertRow(-1);
        row.id = "row" + item[0];
        var celda0 = row.insertCell(0);
        var celda1 = row.insertCell(1);
        var celda2 = row.insertCell(2);
        var celda3 = row.insertCell(3);
        var celda4 = row.insertCell(4);
        var celda5 = row.insertCell(5);
        celda0.innerHTML = item[1];
        celda1.innerHTML = item[2] + "º";
        celda2.innerHTML = item[3] + "%";
        celda3.innerHTML = item[4];
        celda4.innerHTML = item[5].getHours() + ":" + item[5].getMinutes();
        celda5.innerHTML = "<img class='delete' data-id=" + item[0] + " src='images/icons/borrar.png' width='20' height='20'>";
        celda1.style.color = 'green';
        celda2.style.color = 'blue';
        celda3.style.color = 'yellow';
    });
}

function sortData(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("data");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.getElementsByTagName("TR");
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }*/
        }
    }
}

function deleteRow(e){
    var pos = 0;
    document.getElementById("row" + e.target.dataset.id).style.display = 'none';
    dataFromDB.forEach(function(item){
        if (item[0] == e.target.dataset.id){
            delete dataFromDB[pos];
        }
        pos++;
    });
    document.getElementById("search").options.length = 0;
    fillSelect();
}

function fillSelect(){
    var option;
    var select = document.getElementById("search");
    dataFromDB.forEach(function(item){
        option = document.createElement("option");
        option.text = item[1];
        option.value = item[0];
        select.add(option);
    });
}


/* INSIDE METHODS*/