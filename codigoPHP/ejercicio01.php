<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oscar Pascual Ferrero</title>
        <link rel="stylesheet" href="../webroot/css/style.css">
        <link rel="icon" type="image/x-icon" href="../webroot/image/botonFavicon.png">
    </head>
    <body>
        <header>
            <h1>Ejercicio 01</h1>
        </header>
        <main>
            <h2>CONEXION POR MEDIO DE PDO:</h2>
            <?php
            /**
             * @author Oscar Pascual Ferrero
             * @version 1.1 
             * @since 06/11/2023
             */
            define('host', '192.168.20.19'); // Nombre del servidor de la base de datos
            define('dbname', 'DB212DWESProyectoTema4'); // Nombre de la base de datos
            define('username', 'user212DWESProyectoTema4'); // Nombre de usuario de la base de datos
            define('password', 'paso'); // Contraseña de la base de datos
            $attributesPDO = ['AUTOCOMMIT', 'ERRMODE', 'CASE', 'CLIENT_VERSION', 'CONNECTION_STATUS',
            'ORACLE_NULLS', 'SERVER_INFO', 'SERVER_VERSION'];// La variable $attributesPDO almacena los atributos que se pueden mostrar de una base de datos
            // No se incluyen 'PERSISTENT', 'PREFETCH' y 'TIMEOUT'

            // Utilizamos el bloque 'try'
            try {
                // Se instancia un objeto tipo PDO que establece la conexion a la base de datos con el usuario especificado
                $miDB = new PDO('mysql:host=' . host . '; dbname=' . dbname, username, password);
                echo ('CONEXIÓN EXITOSA POR PDO <br>'); // Mensaje si la conexión es exitosa
                foreach ($attributesPDO as $valor) {
                    echo('PDO::<u>ATTR_'.$valor.'</u> => <b>'.$miDB->getAttribute(constant("PDO::ATTR_$valor"))."</b><br>");
                }
            } catch (PDOException $pdoEx) { // Si falla el 'try' , mostramos el mensaje seguido del error correspondiente
                echo ("ERROR DE CONEXIÓN " . $pdoEx->getMessage());
            }
            unset($miDB); //Para cerrar la conexión
            ?>
            <br><br>
            <h2>CONEXION POR MEDIO DE PDO (FALLIDA):</h2>
            <?php
            /* Si quisieramos hacer que salte el 'PDOException' , deberemos de poner algún dato erroneo al crear el objeto.
             * Para ello duplicamos el bloque de código anterior, pero añadiendo un dato erroneo, en este caso podremos mal
             * el '$host' . */
            // Utilizamos el bloque 'try'
            try {
                // Se instancia un objeto tipo PDO que establece la conexion a la base de datos con el usuario especificado
                $miDB = new PDO('mysql:host=192.168.3.218; dbname=' . dbname, username, password);
                echo ("CONEXIÓN EXITOSA POR PDO"); // Mensaje si la conexión es exitosa
            } catch (PDOException $pdoEx) { // Si falla el 'try' , mostramos el mensaje seguido del error correspondiente
                echo ("ERROR DE CONEXIÓN " . $pdoEx->getMessage());
            }
            unset($miDB); //Para cerrar la conexión
            ?>

        </main>
        <footer>
            <p><a href="../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="../indexProyectoTema4.php">Inicio</a> | <a href="https://github.com/discreppo" target="_blank" >GitHub</a></p>
        </footer>
    </body>
</html>