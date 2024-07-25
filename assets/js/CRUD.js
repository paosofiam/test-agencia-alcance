/*CRUD*/
const url = 'app/controller.php';

/* var theData = {
    "id": null,
    "nombre": "Claudia Torres",
    "edad": 85,
    "correo": "claudia.torres@yahoo.com",
    "telefono": "555-9013",
    "direccion": "Calle Meteoro 505, Ciudad",
    "ciudad": "Ciudad",
    "pais": "Ecuador",
    "ocupacion": "Diseñadora",
    "estado_civil": "Soltera"
} */

function saveDB(data){//Saves the new item in the db
    var newUser = JSON.stringify(data);
    info = JSON.stringify({'action': 'saveDB', 'data': newUser});
    petition(info);
}

function editDB(ID,data){//Updates a specific item
    var newUser = JSON.stringify(data);
    info = JSON.stringify({'action': 'editDB', 'ID': ID, 'data': newUser});
    petition(info);
}

function getAllDB(){//Shows the list with all items
    var info = JSON.stringify({'action': 'getAllDB'});
    petition(info);
}

function getDB(ID){//Shows a single item
    var info = JSON.stringify({'action': 'getDB', 'ID': ID});
    petition(info);
}

function getAllRB(){//Shows the list with all items
    var info = JSON.stringify({'action': 'getAllRB'});
    petition(info);
}
/*Logic Deletion*/
function recycle(ID){//Moves a specific item from db to recycle bin
    var info = JSON.stringify({'action': 'recycle', 'ID': ID});
    petition(info);
}

function restore(ID){//Restores a specific item from recycle bin to db
    var info = JSON.stringify({'action': 'restore', 'ID': ID});
    petition(info);
}

function deleteRB(ID){//Deletes a specific item
    var info = JSON.stringify({'action': 'delete', 'ID': ID});
    petition(info);
}
/*Others*/
function petition(info){
    fetch(url,{
        body: info,
        method: 'POST',
        headers: {'Content-Type': 'application/json; charset=utf-8'}
    })
        .then((resp) => { return resp.json() })
            .then(function (resp) {console.log(resp)})  
}