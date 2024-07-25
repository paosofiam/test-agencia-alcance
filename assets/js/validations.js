const VALIDEMAIL =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
var emptyFields = ['error','error','error','error','error','error','error','error','error'];
var emailIsValid = true;

function validateInput1(number){
    var warning = document.getElementById('warning'+number);
    if(document.getElementById('input'+number).value == ''){
        warning.innerHTML = 'Este campo es requerido';
        emptyFields[number-1] = 'error';
    }
    else{
        warning.innerHTML = '';
        emptyFields[number-1] = '';
    }
}

function validateInput2(number){
    if(document.getElementById('input'+number).value != ''){
        document.getElementById('warning'+number).innerHTML = '';
        emptyFields[number-1] = '';
    }
}

function validateEmail(){
    var eMail = document.getElementById('input3');
    var warning = document.getElementById('warning3');
    if(eMail.value == ''){
        warning.innerHTML = 'Este campo es requerido';
        emptyFields[2] = 'error';
    }
    else{
        emptyFields[2] = '';
        if( !VALIDEMAIL.test(eMail.value) ){
            warning.innerHTML = 'Ingrese un correo válido';
            emailIsValid = false;
        }else{
            warning.innerHTML = '';
            emailIsValid = true;
        }
    }
}

function validateForm(){
    var warning = document.getElementById('warning10');
    for(i = 1; i <= 9; i++){
        validateInput1(i);
    }
    validateEmail();
    if(!emailIsValid){
        warning.innerHTML = 'Corrija antes todos los campos';
        return false;
    }
    else{
        if(emptyFields.includes('error')){
            warning.innerHTML = "Llene antes todos los campos requeridos";
            return false;
        }
        else{
            warning.innerHTML = "";
            console.log('Valid Form');
            return true;
        }
    }
}