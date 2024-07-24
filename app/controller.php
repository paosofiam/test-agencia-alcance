<?php
require_once 'model.php';

$dataBase = 'db/data-base.json';
$recycleBin = 'db/recycle-bin.json';

$_POST = json_decode(file_get_contents('php://input'),true);

if($_POST['action']){
    switch ($_POST['action']){
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
/* if($_GET['action']){
    switch ($_GET['action']){
        case 'test':
            test();
            break;
        case 'getAll':
            getAll();
            break;
    }
} */


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
}

function restore($id){
    move($id,'db/recycle-bin.json','db/data-base.json');
    echo 'success';
}

function delete($id){
    destroy($id,'db/recycle-bin.json');
}