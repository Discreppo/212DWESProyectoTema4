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
            <h1>Ejercicio 03</h1>
        </header>
        <main>
            <h2>Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores</h2>
            <?php
            /**
             * @authors Carlos García Cachón y Oscar Pascual Ferrero
             * @version 1.7
             * @since 13/11/2023
             */
            // Incluyo la libreria de validación para comprobar los campos
            require_once '../core/231018libreriaValidacion.php';
            // Incluyo la configuración de conexión a la BD
            require_once '../config/confDB.php';

            // Declaración de constantes por OBLIGATORIEDAD
            define('OPCIONAL', 0);
            define('OBLIGATORIO', 1);

            // Declaración de los limites para el metodo comprobar FLOAT
            define('TAM_MAX_FLOAT', PHP_FLOAT_MAX);
            define('TAM_MIN_FLOAT', PHP_FLOAT_MIN);

            // Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES
            // Valores por defecto
            $entradaOK = true;

            $aRespuestas = [
                'CodDepartamento' => "",
                'DescDepartamento' => "",
                'FechaCreacionDepartamento' => 'now()',
                'VolumenDeNegocio' => "",
                'FechaBajaDepartamento' => 'null'
            ];

            $aErrores = [
                'CodDepartamento' => "",
                'DescDepartamento' => "",
                'VolumenDeNegocio' => "",
            ];
            //En el siguiente if pregunto si el '$_REQUEST' recupero el valor 'enviar' que enviamos al pulsar el boton de enviar del formulario.
            if (isset($_REQUEST['enviar'])) {
                /*
                 * Ahora inicializo cada 'key' del ARRAY utilizando las funciónes de la clase de 'validacionFormularios' , la cuál 
                 * comprueba el valor recibido (en este caso el que recibe la variable '$_REQUEST') y devuelve 'null' si el valor es correcto,
                 * o un mensaje de error personalizado por cada función dependiendo de lo que validemos.
                 */
                //Introducimos valores en el array $aErrores si ocurre un error
                $aErrores['CodDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento'], 3, 3, OBLIGATORIO);

                // Ahora validamos que el codigo introducido no exista en la BD, haciendo una consulta 
                if ($aErrores['CodDepartamento'] == null) {
                    try {
                        // CONEXION BASE DE DATOS
                        // Iniciamos la conexión con la BD
                        $miDB = new PDO(DNS, USERNAME, PASSWORD);
                        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuramos las excepciones
                        // CONSULTA
                        // Consultamos sin preparar ya que nos va a filtrar los departamentos por codigo
                        // En esta línea utilizo 'quote()' se utiliza para escapar y citar el valor del $_REQUEST['CodDepartamento'], ayudando a prevenir la inyección de SQL.
                        $codDepartamento = $miDB->quote($_REQUEST['CodDepartamento']);
                        $resultadoConsultaComprobacionCodigo = $miDB->query("SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento = " . $codDepartamento); // Preparamos la consulta

                        $departamentoExistente = $resultadoConsultaComprobacionCodigo->fetchObject();

                        // COMPROBACION DE ERROR
                        if ($departamentoExistente) {
                            $aErrores['CodDepartamento'] = "El código de departamento ya existe";
                        }
                    } catch (PDOException $miExcepcionPDO) {
                        $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
                        $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

                        echo "<span style='color: red;'>Error: </span>" . $mensajeExcepcion . "<br>"; //Mostramos el mensaje de la excepción
                        echo "<span style='color: red;'>Código del error: </span>" . $errorExcepcion; //Mostramos el código de la excepción
                    } finally {
                        unset($miDB); //Para cerrar la conexión
                    }
                }
                $aErrores['DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'], 255, 1, OBLIGATORIO);
                $aErrores['VolumenDeNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['VolumenDeNegocio'], TAM_MAX_FLOAT, TAM_MIN_FLOAT, OBLIGATORIO);

                /*
                 * En este foreach recorremos el array buscando que exista NULL (Los metodos anteriores si son correctos devuelven NULL)
                 * y en caso negativo cambiara el valor de '$entradaOK' a false y borrara el contenido del campo.
                 */
                foreach ($aErrores as $campo => $error) {
                    if ($error != null) {
                        $_REQUEST[$campo] = "";
                        $entradaOK = false;
                    }
                }
            } else {
                $entradaOK = false;
            }
            //En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas'
            if ($entradaOK) {

                // Utilizamos el bloque 'try'
                try {
                    // CONEXION CON LA BD
                    // Establecemos la conexión por medio de PDO
                    $miDB = new PDO(DNS, USERNAME, PASSWORD);
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuramos las excepciones
                    echo ("CONEXIÓN EXITOSA POR PDO<br><br>"); // Mensaje si la conexión es exitosa

                    $aRespuestas = [
                        'CodDepartamento' => strtoupper($_REQUEST['CodDepartamento']),
                        'DescDepartamento' => $_REQUEST['DescDepartamento'],
                        'VolumenDeNegocio' => $_REQUEST['VolumenDeNegocio'],
                        'FechaCreacionDepartamento' => 'now()',
                        'FechaBajaDepartamento' => 'null'
                    ];

                    // CONSULTA CON QUERY()
                    // Se ejecuta la consulta de insercion                    
                    $miDB->exec("insert into T02_Departamento values ('". $aRespuestas['CodDepartamento'] . "','" . $aRespuestas['DescDepartamento'] . "'," . $aRespuestas['FechaCreacionDepartamento'] . "," . $aRespuestas['VolumenDeNegocio'] . "," . $aRespuestas['FechaBajaDepartamento'] . ");");
                    // Se almacena el resultado de la consulta select
                    $resultadoConsulta = $miDB->query('select * from T02_Departamento');
                    // Creamos una tabla en la que mostraremos la tabla de la BD
                    echo ("<div class='list-group text-center'>");
                    echo ("<table>
                            <thead>
                            <tr>
                                <th>T02_CodDepartamento</th>
                                <th>T02_DescDepartamento</th>
                                <th>T02_FechaCreacionDepartamento</th>
                                <th>T02_VolumenDeNegocio</th>
                                <th>T02_FechaBajaDepartamento</th>
                            </tr>
                            </thead>");

                    /* Aqui recorremos todos los valores de la tabla, columna por columna, usando el parametro 'PDO::FETCH_ASSOC' , 
                     * el cual nos indica que los resultados deben ser devueltos como un array asociativo, donde los nombres de las columnas de 
                     * la tabla se utilizan como claves (keys) en el array.
                     */
                    echo ("<tbody>");
                    while ($oDepartartamento = $resultadoConsulta->fetchObject()) {
                        echo ("<tr>");
                        echo ("<td>" . $oDepartartamento->T02_CodDepartamento . "</td>");
                        echo ("<td>" . $oDepartartamento->T02_DescDepartamento . "</td>");
                        echo ("<td>" . $oDepartartamento->T02_FechaCreacionDepartamento . "</td>");
                        echo ("<td>" . $oDepartartamento->T02_VolumenDeNegocio . "</td>");
                        echo ("<td>" . $oDepartartamento->T02_FechaBajaDepartamento . "</td>");
                        echo ("</tr>");
                    }

                    echo ("</tbody>");
                    /* Ahora usamos la función 'rowCount()' que nos devuelve el número de filas afectadas por la consulta y 
                     * almacenamos el valor en la variable '$numeroDeRegistros'
                     */
                    $numeroDeRegistrosConsultaPreparada = $resultadoConsulta->rowCount();
                    // Y mostramos el número de registros
                    echo ("<tfoot ><tr style='background-color: #666; color:white;'><td colspan='4'>Número de registros en la tabla Departamento: " . $numeroDeRegistrosConsultaPreparada . '</td></tr></tfoot>');
                    echo ("</table>");
                    echo ("</div>");
                } catch (PDOException $miExcepcionPDO) {
                    $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
                    $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

                    echo "<span style='color: red;'>Error: </span>" . $mensajeExcepcion . "<br>"; //Mostramos el mensaje de la excepción
                    echo "<span style='color: red;'>Código del error: </span>" . $errorExcepcion; //Mostramos el código de la excepción
                } finally {
                    unset($miDB); // Para cerrar la conexión
                }
            } else {
                ?>
                <!-- Codigo del formulario -->
                <form name="insercionValoresTablaDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <fieldset>
                        <table>
                            <thead>
                                <tr>
                                    <th class="rounded-top" colspan="3"><legend>Creación de Departamento</legend></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- T02_CodDepartamento Obligatorio -->
                                    <td class="d-flex justify-content-start">
                                        <label for="T02_CodDepartamento">T02_CodDepartamento:</label>
                                    </td>
                                    <td> <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devolveremos el contenido del campo
                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                        <input class="obligatorio d-flex justify-content-start" type="text" placeholder="AAD" name="CodDepartamento" value="<?php echo (isset($_REQUEST['CodDepartamento']) ? $_REQUEST['CodDepartamento'] : ''); ?>">
                                    </td>
                                    <td class="error">
                                        <?php
                                        if (!empty($aErrores['CodDepartamento'])) {
                                            echo $aErrores['CodDepartamento'];
                                        }
                                        ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                    </td>
                                </tr>
                                <tr>
                                    <!-- T02_DescDepartamento Obligatorio -->
                                    <td class="d-flex justify-content-start">
                                        <label for="T02_DescDepartamento">T02_DescDepartamento:</label>
                                    </td>
                                    <td><!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                        <input class="obligatorio d-flex justify-content-start" type="text" name="DescDepartamento" placeholder="Departamento de Ventas" value="<?php echo (isset($_REQUEST['DescDepartamento']) ? $_REQUEST['DescDepartamento'] : ''); ?>">
                                    </td>
                                    <td class="error">
                                        <?php
                                        if (!empty($aErrores['DescDepartamento'])) {
                                            echo $aErrores['DescDepartamento'];
                                        }
                                        ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                    </td>
                                </tr>
                                <tr>
                                    <!-- T02_FechaBajaDepartamento Opcional -->
                                    <td class="d-flex justify-content-start">
                                        <label for="T02_FechaCreacionDepartamento">T02_FechaCreacionDepartamento:</label>
                                    </td>
                                    <td><!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->

                                        <input disabled class="d-flex justify-content-start bloqueado" type="text" name="FechaCreacionDepartamento" placeholder="<?php echo (new DateTime('now'))->format('Y-m-d H:i:s'); ?>" value="<?php echo (isset($_REQUEST['FechaCreacionDepartamento']) ? $_REQUEST['FechaCreacionDepartamento'] : ''); ?>">
                                    </td>
                                    <td class="error">
                                        <?php
                                        if (!empty($aErrores['FechaCreacionDepartamento'])) {
                                            echo $aErrores['FechaCreacionDepartamento'];
                                        }
                                        ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                    </td>
                                </tr>
                                <tr>
                                    <!-- T02_VolumenDeNegocio Obligatorio -->
                                    <td class="d-flex justify-content-start">
                                        <label for="T02_VolumenDeNegocio">T02_VolumenDeNegocio:</label>
                                    </td>
                                    <td><!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                        <input class="obligatorio d-flex justify-content-start" type="text" name="VolumenDeNegocio" placeholder="1234.5" value="<?php echo (isset($_REQUEST['VolumenDeNegocio']) ? $_REQUEST['VolumenDeNegocio'] : ''); ?>">
                                    </td>
                                    <td class="error">
                                        <?php
                                        if (!empty($aErrores['VolumenDeNegocio'])) {
                                            echo $aErrores['VolumenDeNegocio'];
                                        }
                                        ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                    </td>
                                </tr>
                                <tr>
                                    <!-- T02_FechaBajaDepartamento Opcional -->
                                    <td class="d-flex justify-content-start">
                                        <label for="T02_FechaBajaDepartamento">T02_FechaBajaDepartamento:</label>
                                    </td>
                                    <td><!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                        <input disabled class="d-flex justify-content-start bloqueado" type="text" name="FechaBajaDepartamento" placeholder="YYYY/mm/dd HH:ii:ss" value="<?php echo (isset($_REQUEST['FechaBajaDepartamento']) ? $_REQUEST['FechaBajaDepartamento'] : ''); ?>">
                                    </td>
                                    <td class="error">
                                        <?php
                                        if (!empty($aErrores['FechaBajaDepartamento'])) {
                                            echo $aErrores['FechaBajaDepartamento'];
                                        }
                                        ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" name="enviar">Crear</button>
                    </fieldset>
                </form>
                <?php
            }
            ?>

        </main>
        <footer>
            <p><a href="../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="../indexProyectoTema4.php">Inicio</a> | <a href="https://github.com/Discreppo/212DWESProyectoTema4" target="blank" >GitHub</a></p>
        </footer>
    </body>
</html>