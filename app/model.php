<?php

$dataBase = 'db/data-base.json';
$recycleBin = 'db/recycle-bin.json';
/*CRUD*/
function index($dbPath){//Shows the list with all items
    $jsonString = file_get_contents($dbPath);
    $usersArray = json_decode($jsonString, true);
    return $usersArray;
}

function store($newUserData,$db){//Saves the new item in the db ////////////////////////////
    $allUsers = index($db);
    $allUsers[0]["Last_ID"] = $allUsers[0]["Last_ID"]+1;
    $newUserData['id'] = $allUsers[0]["Last_ID"];
    add($allUsers,$newUserData,$db);
}

function show($id,$db){//Shows a single item
    $allUsers = index($db);
    $index = findID($id,$allUsers);
    if($index != false){
        return $allUsers[$index];
    }
}

function update($id,$data,$db){//Updates a specific item  ///////////////////////////////////
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
    echo $index;
    if($index !== false){
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
            $foundID = (int)$key;
            break;
        }
    }
    return (int)$foundID;
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