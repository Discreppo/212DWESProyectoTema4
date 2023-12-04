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
            <h1>Ejercicio 04</h1>
        </header>
        <main>
            <h2>Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores</h2>
            <?php
            /*
             * @author Rebeca Sánchez Pérez y Oscar Pascual Ferrero
             * @version 1.2
             * @since 14/11/2023
             */

            // DECLARACION E INICIALIZACION DE VARIABLES
            // Se incuye la libreria de validacion para usar los metodos de validacion de las entradas del formulario
            require_once '../core/231018libreriaValidacion.php';
            // Incluyo la configuración de conexión a la BD
            require_once '../config/confDBPDO.php';
            // La varible $entradaOK es un interruptor que recibe el valor true cuando no existe ningun error en la entrada
            $entradaOK = true;
            // El array $aRespuestas almacena los valores que son introducidos en cada input del formulario
            $aRespuestas = [
                'descDepartamentoABuscar' => ''
            ];
            // El array $aErrores almacena los valores que no cumplan los requisitos que se hayan introducido en el formulario
            $aErrores = [
                'descDepartamentoABuscar' => ''
            ];

            // Si el fromulario ha sido rellenado, se valida la entrada
            if (isset($_REQUEST['buscar'])) {
                // VALIDACIONES
                // Se comprueba que el valor introducido en el campo 'descDepartamento' sea un valor alfabetico con longitud maxima de 255 caracterres, si no lo es, se añade un mensaje de error al array $aErrores
                $aErrores['descDepartamentoABuscar'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamentoABuscar'], 255, 1, 0);

                // Se recorre el array de errores 
                foreach ($aErrores as $campo => $error) {
                    // Si existe algun error se cambia el valor de $entradaOK a false y se limpia ese campo
                    if ($error != null) {
                        $_REQUEST[$campo] = '';
                        $entradaOK = false;
                    }
                }

                // Si el formulario NUNCA ha sido rellenado, se inicializa $entradaOK a false    
            } else {
                $entradaOK = false;
            }
            ?>
            <div class="ejercicio">
                <!-- Se crea un formulario tipo post para agregar la opcion de busqueda-->
                <form name= "ejercicio3" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form3" method="post">
                    <table class="barraBusqueda">
                        <tr>
                            <td><label for="descDepartamentoABuscar">Descripcion a buscar: </label></td>
                            <td><input type="text" name="descDepartamentoABuscar" id="descDepartamentoABuscar" value="<?php echo(isset($_REQUEST['descDepartamentoABuscar']) ? $_REQUEST['descDepartamentoABuscar'] : '') ?>"></td>
                            <td><input type="submit" form="form3" value="Buscar" name="buscar" class="botonBuscar"></td>
                            <td><?php // Se muestra el mensaje de error 
            echo('<p class="error">' . $aErrores['descDepartamentoABuscar'] . '</p>');
            ?></td>
                        </tr>
                    </table>
                </form>
            </div>


            <?php
            // TRATAMIENTO DE DATOS
            // Se añaden al array $aRespuestas las respuestas cuando son correctas
            if ($entradaOK) {
                $aRespuestas['descDepartamentoABuscar'] = $_REQUEST['descDepartamentoABuscar'];
            
            }

            // Se ataca a la base de datos
            try {
                // Se instancia un objeto tipo PDO que establece la conexion a la base de datos con el usuario especificado
                $miDB = new PDO(DSN, USERNAME, PASSWORD);

                // Se inicializa la consulta de insercion
                $consulta = "select * from T02_Departamento where T02_DescDepartamento like '%" . $aRespuestas['descDepartamentoABuscar'] . "%';";
                // Se almacena el resultado de la consulta
                $resultadoConsulta = $miDB->prepare($consulta);
                // Se ejecuta la consulta
                $resultadoConsulta->execute();
//                // Se almacena el numero de filas afectadas
//                $count = $resultadoConsulta->rowCount();
//                echo('<div class="ejercicio">');
//                // Se muestra por pantalla el numero de tuplas de la tabla departamentos
//                echo('Coincidencias: <b>'.$count.'</b></div>');
                // Se crea una tabla para imprimir las tuplas
                echo('<div class="ejercicio"><h2>Departamentos:</h2><table class="ej16"><tr><th>Codigo</th><th>Descripcion</th><th>Fecha de alta</th><th>Volumen</th><th>Fecha de baja</th></tr>');
                // Se instancia un objeto tipo PDO que almacena cada fila de la consulta
                while ($oDepartamento = $resultadoConsulta->fetchObject()) {
                    echo('<tr>');
                    echo('<td>' . $oDepartamento->T02_CodDepartamento . '</td>');
                    echo('<td>' . $oDepartamento->T02_DescDepartamento . '</td>');
                    echo('<td>' . $oDepartamento->T02_FechaCreacionDepartamento . '</td>');
                    echo('<td>' . $oDepartamento->T02_VolumenDeNegocio . '</td>');
                    echo('<td>' . $oDepartamento->T02_FechaBajaDepartamento . '</td>');
                    echo('</tr>');
                }
                echo('</table>');
                echo('</div>');

                // Se cierra la conexion con la base de datos
                unset($miDB);
            } catch (PDOException $exception) {
                // Si aparecen errores, se muestra por pantalla el error
                echo('<div class="ejercicio"><span class="error">❌ Ha fallado la conexion: ' . $exception->getMessage() . '</span></div>');
            }
            ?>          
        </main>
        <footer>
            <p><a href="../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="../indexProyectoTema4.php">Inicio</a> | <a href="https://github.com/Discreppo/212DWESProyectoTema4" target="blank" >GitHub</a></p>
        </footer>
    </body>
</html>