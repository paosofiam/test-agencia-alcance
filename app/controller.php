<?php
require_once 'model.php';

$_POST = json_decode(file_get_contents('php://input'),true);

if($_POST['action']){
    switch ($_POST['action']){
        case 'saveDB':
            saveDB($_POST['data']);
            break;
        case 'editDB':
            editDB($_POST['ID'],$_POST['data']);
            break;
        case 'getAllDB':
            getAllDB();
            break;
        case 'getDB':
            getDB($_POST['ID']);
            break;
        case 'getAllRB':
            getAllRB();
            break;
        case 'recycle':
            recycle($_POST['ID']);
            break;
        case 'restore':
            restore($_POST['ID']);
            break;
        case 'delete':
            delete($_POST['ID']);
            break;
    }
}

function saveDB($data){//Saves the new item in the db
    $newUser = json_decode($data,true);
    store($newUser,'db/data-base.json');
    echo 'Saved';
}

function editDB($id,$data){//Updates a specific item
    $newUser = json_decode($data,true);
    update($id,$newUser,'db/data-base.json');
    echo 'Saved';
}

function getAllDB(){
    $result = index('db/data-base.json');
    echo json_encode($result);
}

function getDB($id){
    $result = show($id,'db/data-base.json');
    echo json_encode($result);
}

function getAllRB(){
    $result = index('db/recycle-bin.json');
    echo json_encode($result);
}

function recycle($id){
    move($id,'db/data-base.json','db/recycle-bin.json');
    echo 'Recycled';
}

function restore($id){
    move($id,'db/recycle-bin.json','db/data-base.json');
    echo 'Restored';
}

function delete($id){
    destroy($id,'db/recycle-bin.json');
    echo 'Deleted';
}