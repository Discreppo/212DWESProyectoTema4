<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oscar Pascual Ferrero</title>
        <link rel="stylesheet" href="../webroot/css/style.css">        
    </head>
    <body>
        <header>
            <h1>Ejercicio 01</h1>
        </header>
        <main>
            <h2>CONEXION POR MEDIO DE PDO:</h2>
            <?php
            $servername = "nombre_del_servidor";
            $username = "nombre_de_usuario";
            $password = "contrasena_de_usuario";
            $dbname = "nombre_de_la_base_de_datos";

            // Conexión a la base de datos
            $conexion = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión a la base de datos: " . $conexion->connect_error);
            }
            
            // A partir de este punto, puedes ejecutar consultas en la base de datos
            // Ejemplo: Seleccionar datos de una tabla
            $sql = "SELECT columna1, columna2 FROM tabla WHERE condicion = 'algun_valor'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while ($fila = $result->fetch_assoc()) {
                    echo $fila['columna1'] . " - " . $fila['columna2'] . "<br>";
                }
            } else {
                echo "No se encontraron resultados.";
            }

            // Cerrar la conexión
            $conexion->close();
            ?>


        </main>
        <footer>
            <p><a href="../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="../indexProyectoTema4.php">Inicio</a> | <a href="https://github.com/discreppo" target="_blank" >GitHub</a></p>
        </footer>
    </body>
</html>