<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/config.css">
</head>
<body>
    <header>
        <button type="button">Saltar a contenido</button>
        <a href=""><img src="" alt="Inicio"></a>
        <nav>
            <a href="app/views/recycle-bin.php"></a>
        </nav>
        <button type="button"><img src="" alt="Menú de Opciones"></button>
    </header>
    <main>
        <button type="button" onclick="formPanelMode(create)">Crear nuevo Usuario</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Número Telefónico</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody id="dynamicTable">
            </tbody>
        </table>
    </main>
    <footer></footer>
    <div>
        <form id="userOptions" action="">
            <h3 id="input0"><!-- Agregar Usuario/Usuario: --></h3>
            <label for="">
                <span>Nombre:</span>
                <input id="input1" type="text" onblur="validateInput1(1)" oninput="validateInput2(1)" required autocomplete="name">
                <span id="warning1"></span>
            </label>
            <label for="">
                <span>Edad:</span>
                <input id="input2" type="number" onblur="validateInput1(2)" oninput="validateInput2(2)" required autocomplete="on">
                <span id="warning2"></span>
            </label>
            <label for="">
                <span>Correo Electrónico:</span>
                <input id="input3" type="email" onblur="validateEmail()" oninput="validateInput2(3)" required autocomplete="email">
                <span id="warning3"></span>
            </label>
            <label for="">
                <span>Teléfono:</span>
                <input id="input4" type="tel" onblur="validateInput1(4)" oninput="validateInput2(4)" required autocomplete="tel">
                <span id="warning4"></span>
            </label>
            <label for="">
                <span>Dirección:</span>
                <input id="input5" type="text" onblur="validateInput1(5)" oninput="validateInput2(5)" required autocomplete="street-address">
                <span id="warning5"></span>
            </label>
            <label for="">
                <span>Ciudad:</span>
                <input id="input6" type="text" onblur="validateInput1(6)" oninput="validateInput2(6)" required autocomplete="address-level2">
                <span id="warning6"></span>
            </label>
            <label for="">
                <span>País:</span>
                <input id="input7" type="text" onblur="validateInput1(7)" oninput="validateInput2(7)" required autocomplete="country-name">
                <span id="warning7"></span>
            </label>
            <label for="">
                <span>Ocupación:</span>
                <input id="input8" type="text" onblur="validateInput1(8)" oninput="validateInput2(8)" required autocomplete="organization-title">
                <span id="warning8"></span>
            </label>
            <label for="">
                <span>Estado Civil:</span>
                <input id="input9" type="text" onblur="validateInput1(9)" oninput="validateInput2(9)" required autocomplete="on">
                <span id="warning9"></span>
            </label>
            <div id="formPanel">
            </div>
            <span id="warning10"></span>
        </form>
    </div>
    <div>
        <div>
            <span>¿Deseas enviar este usuario a la papelera de reciclaje?</span>
            <div>
                <button id="deleteButton" type="button" onclick="">Eliminar</button>
                <button type="button">Cancelar</button>
            </div>
        </div>
    </div>
    <script src="assets/js/CRUD.js"></script>
    <script src="assets/js/interactions.js"></script>
    <script src="assets/js/validations.js"></script>
</body>
</html>