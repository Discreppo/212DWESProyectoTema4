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
            <h1>Ejercicio 02</h1>
        </header>
        <main>
            <h2>Mostrar el contenido de la tabla Departamento y el número de registros</h2>
            <?php
            /**
             * @author Oscar Pascual Ferrero
             * @version 1.1 
             * @since 06/11/2023
             */
            
            // Utilizamos el bloque 'try'
            try {
                //Declaración las constantes que almacenan los valores de la conexión.
                require_once '../config/confDB.php';
                // Se instancia un objeto tipo PDO que establece la conexion a la base de datos con el usuario especificado
                $miDB = new PDO('mysql:host=' . host . '; dbname=' . dbname, username, password);
                // Se preparan las consultas
                $consulta = $miDB->prepare('select * from Departamento');
                // Se ejecuta la consulta
                $consulta->execute();
                // Se almacena la primera fila de la consulta en un objeto
                //$oDepartamento = $consulta->fetchObject(PDO::FETCH_OBJ);
                // Se crea una tabla para imprimir las tuplas
                echo('<div class="ejercicio"><h2>Con una consulta preparada:</h2><table class="ej16"><tr><th>Codigo</th><th>Descripcion</th><th>Fecha de baja</th><th>Volumen</th></tr>');
                /* Aqui recorremos todos los valores de la tabla, columna por columna, usando el metodo 'fetchObject()' , 
                 * el cual nos devuelve un objeto con sus propiedades asignadas desde los valores de la columna respectiva.
                 */
                while ($oDepartamento = $consulta->fetchObject()) {
                    echo ("<tr>");
                    echo ("<td>" . $oDepartamento->CodDepartamento . "</td>");
                    echo ("<td>" . $oDepartamento->DescDepartamento . "</td>");
                    echo ("<td>" . $oDepartamento->FechaBaja . "</td>");
                    echo ("<td>" . $oDepartamento->VolumenNegocio . "</td>");
                    echo ("</tr>");
                }                
                echo('</table>');
                /* Ahora usamos la función 'rowCount()' que nos devuelve el número de filas afectadas por la consulta y 
                 * almacenamos el valor en la variable '$numeroDeRegistros'
                 */
                $numeroDeRegistros = $consulta->rowCount();
                // Y mostramos el número de registros
                echo ("Número de registros en la tabla Departamento: " . $numeroDeRegistros);
                echo('</div>');
                unset($miDB);
            } catch (PDOException $exception) { // Si falla el 'try' , mostramos el mensaje seguido del error correspondiente
                // Si aparecen errores, se muestra por pantalla el error
                echo('<div class="ejercicio"><span class="error">❌ Ha fallado la conexion: ' . $exception->getMessage() . '</span></div>');
            }
            unset($miDB); //Para cerrar la conexión
            
            // Utilizamos el bloque 'try'
            try {
                //Declaración las constantes que almacenan los valores de la conexión.
                require_once '../config/confDB.php';
                // Se instancia un objeto tipo PDO que establece la conexion a la base de datos con el usuario especificado
                $miDB = new PDO('mysql:host=' . host . '; dbname=' . dbname, username, password);
                //Ejecutamos una query de consulta de la tabla Departamento.
                $consulta = $miDB->query('select * from Departamento');                
                // Se almacena la primera fila de la consulta en un objeto
                //$oDepartamento = $consulta->fetchObject(PDO::FETCH_OBJ);
                // Se crea una tabla para imprimir las tuplas
                echo('<div class="ejercicio"><h2>Sin consulta preparada:</h2><table class="ej16"><tr><th>Codigo</th><th>Descripcion</th><th>Fecha de baja</th><th>Volumen</th></tr>');
                /* Aqui recorremos todos los valores de la tabla, columna por columna, usando el metodo 'fetchObject()' , 
                 * el cual nos devuelve un objeto con sus propiedades asignadas desde los valores de la columna respectiva.
                 */
                while ($oDepartamento = $consulta->fetchObject()) {
                    echo ("<tr>");
                    echo ("<td>" . $oDepartamento->CodDepartamento . "</td>");
                    echo ("<td>" . $oDepartamento->DescDepartamento . "</td>");
                    echo ("<td>" . $oDepartamento->FechaBaja . "</td>");
                    echo ("<td>" . $oDepartamento->VolumenNegocio . "</td>");
                    echo ("</tr>");
                }
                $numeroDeRegistros = $consulta->rowCount();
                // Y mostramos el número de registros
                echo ("Número de registros en la tabla Departamento: " . $numeroDeRegistros);
                echo('</table>');
                /* Ahora usamos la función 'rowCount()' que nos devuelve el número de filas afectadas por la consulta y 
                 * almacenamos el valor en la variable '$numeroDeRegistros'
                 */
                
                echo('</div>');
                unset($miDB);
            } catch (PDOException $exception) { // Si falla el 'try' , mostramos el mensaje seguido del error correspondiente
                // Si aparecen errores, se muestra por pantalla el error
                echo('<div class="ejercicio"><span class="error">❌ Ha fallado la conexion: ' . $exception->getMessage() . '</span></div>');
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