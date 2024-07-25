/**/
function saveNewUser(){
    if(validateForm()){
        var data = readForm();
        saveDB(data);
        window.location.reload();
    }
}

function saveUserChanges(ID){
    if(validateForm()){
        var data = readForm();
        editDB(ID,data)
        window.location.reload();
    }
}
/*Open-Close Form*/
function create(){//Shows a form to create a new item
    emptyFrom();
    ableFrom(true);
}

function closeButton(){
    ableFrom(false);
    emptyFrom();
    formPanelMode(hidden);
}
/*Form modes*/
var create = '<button type="button" onclick="saveNewUser()">Guardar</button><button type="button" onclick="closeButton()">Cancelar</button>';
var hidden = '';

function formPanelMode(string){
    document.getElementById('formPanel').innerHTML = string;
}

function formPanelEditMode(mode,ID){
    if(mode){
        document.getElementById('formPanel').innerHTML = '<button type="button" onclick="saveUserChanges('+ID+')">Guardar</button><button type="button" onclick="getDB('+ID+')">Cancelar</button>';
        ableFrom(true);
    }
    else{
        document.getElementById('formPanel').innerHTML = '<button type="button" onclick="formPanelEditMode(true,'+ID+')">Editar</button><button type="button" onclick="areYouSure('+ID+')">Eliminar</button><button type="button" onclick="closeButton()">Cerrar</button>';
    }
}
/*Modal Delete*/
function areYouSure(ID){
    document.getElementById("deleteButton").setAttribute('onclick','deleteRB('+ID+')');
}

function notSure(){
    document.getElementById("deleteButton").setAttribute('onclick','');
}
/*Form Actions*/
function readForm(){
    var data ={
        "id": 'NA',
        "nombre": document.getElementById('input1').value,
        "edad": document.getElementById('input2').value,
        "correo": document.getElementById('input3').value,
        "telefono": document.getElementById('input4').value,
        "direccion": document.getElementById('input5').value,
        "ciudad": document.getElementById('input6').value,
        "pais": document.getElementById('input7').value,
        "ocupacion": document.getElementById('input8').value,
        "estado_civil": document.getElementById('input9').value
    }
    return data;
}

function fillForm(user){
    var i = 0;
    Object.keys(user).forEach(key =>{
        if(key == 'id'){
            document.getElementById('input'+i).innerHTML = 'Usuario: '+user[key];
        }
        else{
            document.getElementById('input'+i).value = user[key];
        }
        ++i;
    });
}

function emptyFrom(){
    for(i = 0 ; i <= 9 ; i++){
        if(i == 0){
            document.getElementById('input'+i).innerHTML = "";
        }
        else{
            document.getElementById('input'+i).value = "";
        }
    }
}

function ableFrom(value){
    for(i = 1 ; i <= 9 ; i++){
            document.getElementById('input'+i).disabled = !value;
    }
}