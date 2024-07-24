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
            <tbody>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Correo Electrónico</td>
                <td>Número Telefónico</td>
                <td><button type="button">Ver más</button></td>
            </tr>
            </tbody>
        </table>
    </main>
    <footer></footer>
    <div>
        <form action="">
            <h3><!-- Agregar Usuario/ID: --></h3>
            <label for="">
                <span>Nombre:</span>
                <input type="text">
            </label>
            <label for="">
                <span>Edad:</span>
                <input type="text">
            </label>
            <label for="">
                <span>Correo Electrónico:</span>
                <input type="text">
            </label>
            <label for="">
                <span>Teléfono:</span>
                <input type="text">
            </label>
            <label for="">
                <span>Dirección:</span>
                <input type="text">
            </label>
            <label for="">
                <span>Ciudad:</span>
                <input type="text">
            </label>
            <label for="">
                <span>País:</span>
                <input type="text">
            </label>
            <label for="">
                <span>Ocupación:</span>
                <input type="text">
            </label>
            <label for="">
                <span>Estado Civil:</span>
                <input type="text">
            </label>
            <div>
                <button type="button">Editar</button>
                <button type="button">Eliminar</button>
                <button type="button">Guardar</button>
                <button type="button">Cancelar</button>
                <button type="button">Cerrar</button>
            </div>
        </form>
    </div>
    <div>
        <div>
            <span>¿Deseas enviar este usuario a la papelera de reciclaje?</span>
            <div>
                <button type="button">Eliminar</button>
                <button type="button">Cancelar</button>
            </div>
        </div>
    </div>
    <script src="assets/js/controller.js"></script>
    <button type="button" onclick="restore(5)">show1</button>
</body>
</html>