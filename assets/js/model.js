/*CRUD*/
const url = 'app/controller.php';

function store(data){//Saves the new item in the db

}

function update(ID,data){//Updates a specific item

}

function getAllDB(){//Shows the list with all items
    info = JSON.stringify({'action': 'getAllDB'});
    petition(info);
}

function getDB(ID){//Shows a single item
    info = JSON.stringify({'action': 'getDB', 'ID': ID});
    petition(info);
}

function getAllRB(){//Shows the list with all items
    info = JSON.stringify({'action': 'getAllRB'});
    petition(info);
}
/*Logic Deletion*/
function recycle(ID){//Moves a specific item from db to recycle bin
    info = JSON.stringify({'action': 'recycle', 'ID': ID});
    petition(info);
}

function restore(ID){//Restores a specific item from recycle bin to db
    info = JSON.stringify({'action': 'restore', 'ID': ID});
    petition(info);
}

function deleteRB(ID){//Deletes a specific item
    info = JSON.stringify({'action': 'delete', 'ID': ID});
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
            .then(function (response) { console.log(response)})
}