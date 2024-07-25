/*CRUD*/
const url = 'app/controller.php';

getAllDB();

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
    fetch(url,{
        body: JSON.stringify({'action': 'getAllDB'}),
        method: 'POST',
        headers: {'Content-Type': 'application/json; charset=utf-8'}
    })
        .then((resp) => { return resp.json() })
            .then(function (response) {
                var content = '';
                response.forEach(function (user) {//Joins all the data recived by the petition in a single string to be used
                    if(user.id != 'NA'){
                        content += '<tr><td>' + user.id + '</td><td>' + user.nombre + '</td><td>' + user.correo + '</td><td>' + user.telefono + '</td><td><button type="button" onclick="getDB('+user.id+')">Ver más</button></td></tr>';
                    }
                });
                document.getElementById("dynamicTable").innerHTML = content;
            }) 
}

function getDB(ID){//Shows a single item
    fetch(url,{
        body: JSON.stringify({'action': 'getDB', 'ID': ID}),
        method: 'POST',
        headers: {'Content-Type': 'application/json; charset=utf-8'}
    })
        .then((resp) => { return resp.json() })
            .then(function (response) {
                ableFrom(false);
                fillForm(response);
                formPanelEditMode(false,ID)
            })
}

function getAllRB(){//Shows the list with all items
    fetch(url,{
        body: JSON.stringify({'action': 'getAllRB'}),
        method: 'POST',
        headers: {'Content-Type': 'application/json; charset=utf-8'}
    })
        .then((resp) => { return resp.json() })
            .then(function (resp) {console.log(resp)})
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
        .then((resp) => { return resp.text() })
            .then(function (resp) {console.log(resp)})  
}