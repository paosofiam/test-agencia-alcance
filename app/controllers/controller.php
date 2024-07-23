<?php
$dataBase = 'db/data-base.json';
$recycleBin = 'db/recycle-bin.json';

$newUser = array(
    "id"=> null,
    "nombre"=> "Panchita Torres",
    "edad"=> 33,
    "correo"=> "claudia.torres@yahoo.com",
    "telefono"=> "555-9013",
    "direccion"=> "Calle Meteoro 505, Ciudad",
    "ciudad"=> "Ciudad",
    "pais"=> "Ecuador",
    "ocupacion"=> "Diseñadora",
    "estado_civil"=> "Soltera"
);

move(4,$recycleBin,$dataBase);
/*CRUD*/
function index($dbPath){//Shows the list with all items
    $jsonString = file_get_contents($dbPath);
    $usersArray = json_decode($jsonString, true);
    return $usersArray;
}

function create(){//Shows a form to create a new item

}

function store($db,$newUserData){//Saves the new item in the db
    $allUsers = index($db);
    $allUsers[0]["Last_ID"] = $allUsers[0]["Last_ID"]+1;
    $newUserData['id'] = $allUsers[0]["Last_ID"];
    add($allUsers,$newUserData,$db);
}

function show($id,$db){//Shows a single item
    $allUsers = index($db);
    $index = findID($id,$allUsers);
    if($index != false){
        var_dump($allUsers[$index]);
    }
}

function edit(){//Shows a form to edit an item

}

function update($id,$data,$db){//Updates a specific item
    $allUsers = index($db);
    $index = findID($id,$allUsers);
    if($index != false){
        $data["id"]= $id;
        $allUsers[$index] = $data;
        writeJSON($allUsers,$db);
    }
}

function destroy($id,$db){//Deletes a specific item
    $allUsers = index($db);
    $index = findID($id,$allUsers);
    if($index != false){
        remove($allUsers,$index,$db);
    }
}
/*Logic Deletion*/
function move($id,$origin,$destiny){//Moves a specific item between db's
    $allUsersOrigin = index($origin);
    $index = findID($id,$allUsersOrigin);
    if($index != false){
        $user = $allUsersOrigin[$index];
        $allUsersDestiny = index($destiny);
        add($allUsersDestiny,$user,$destiny);
        remove($allUsersOrigin,$index,$origin);
    }
}
/*Others*/
function findID($id,$array){
    $foundID = false;
    foreach($array as $key => $user){
        if($user["id"] == $id){
            $foundID = $key;
            break;
        }
    }
    return $foundID;
}

function add($array,$newElement,$db){
    array_push($array,$newElement);
    writeJSON($array,$db);
}

function remove($array,$index,$db){
    unset($array[$index]);
    writeJSON($array,$db);
}

function writeJSON($content,$url){
    $jsonString = json_encode($content, JSON_PRETTY_PRINT);
    file_put_contents($url, $jsonString);
}