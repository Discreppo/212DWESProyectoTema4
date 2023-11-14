<!DOCTYPE html>
<html lang="es">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oscar Pascual Ferrero</title>
        <link rel="stylesheet" href="webroot/css/style.css">
        <link rel="icon" type="image/x-icon" href="/webroot/image/botonFavicon.png">         
    </head>
    <body>
        <header>
            <h1>Caracteristicas del lenguaje PHP</h1>
        </header>

        <main>
            <!-- Contenido principal de tu sitio web -->
            <h1>Scripts</h1>
            <table>
                <tr>
                    <th>Script DB</th>
                    <th>Mostrar entorno desarrollo</th>
                    <th>Mostrar entorno explotación</th>
                </tr>
                <tr>
                    <td>Crea estructura de la base de datos</td> 
                    <td><a href="mostrarcodigo/mostrarScriptCreaDB.php">Mostrar</a></td>
                </tr>                
                <tr>
                    <td>Incluye los datos de la tabla indicada</td>
                    <td><a href="mostrarcodigo/mostrarScriptCargaInicialDB.php">Mostrar</a></td>
                </tr>                
                <tr>
                    <td>Elimina todo</td> 
                    <td><a href="mostrarcodigo/mostrarScriptBorraDB.php">Mostrar</a></td>
                </tr>
            </table>
            <h1>Tabla de Ejercicios</h1>
            <table>
                <tr>
                    <th>Ejercicios</th>
                    <th>Ejecución MySQLi</th>
                    <th>Código MySQLi</th>
                    <th>Ejecución PDO</th>
                    <th>Código PDO</th>
                    
                </tr>
                <tr>
                    <td>1. (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                    <td><a href="codigoPHP/ejercicio00.php"></a>Ejecutar MySQLi</td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"></a>Mostrar MySQLi</td>
                    <td><a href="codigoPHP/ejercicio01.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio01.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                </tr>
                <tr>
                    <td>2. Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                    <td><a href="codigoPHP/ejercicio00.php"></a>Ejecutar MySQLi</td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"></a>Mostrar MySQLi</td>
                    <td><a href="codigoPHP/ejercicio02.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio02.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                </tr>
                <tr>
                    <td>3. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y
                        control de errores.</td>
                    <td><a href="codigoPHP/ejercicio00.php"></a>Ejecutar MySQLi</td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"></a>Mostrar MySQLi</td>
                    <td><a href="codigoPHP/ejercicio03.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio03.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                </tr>
                <tr>
                    <td>4. Formulario de búsqueda de departamentos por descripción (por una parte del campo
                        DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</td>
                    <td><a href="codigoPHP/ejercicio00.php"></a>Ejecutar MySQLi</td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"></a>Mostrar MySQLi</td>
                    <td>Ejecutar PDO</td>
                    <td>Mostrar PDO</td>
                </tr>
                <tr>
                    <td>5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                        insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</td>
                    <td><a href="codigoPHP/ejercicio00.php"></a>Ejecutar MySQLi</td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"></a>Mostrar MySQLi</td>
                    <td>Ejecutar PDO</td>
                    <td>Mostrar PDO</td>
                </tr>
                <tr>
                    <td>6. Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
                        utilizando una consulta preparada. </td>
                    <td><a href="codigoPHP/ejercicio00.php"></a>Ejecutar MySQLi</td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"></a>Mostrar MySQLi</td>
                    <td>Ejecutar PDO</td>
                    <td>Mostrar PDO</td>
                </tr>
                <tr>
                    <td>7. Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
                        Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
                        directorio .../tmp/ del servidor</td>
                    <td><a href="codigoPHP/ejercicio00.php"></a>Ejecutar MySQLi</td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"></a>Mostrar MySQLi</td>
                    <td>Ejecutar PDO</td>
                    <td>Mostrar PDO</td>
                </tr>
                <tr>
                    <td>8. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
                        fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
                        encuentra en el directorio .../tmp/ del servidor</td>
                    <td><a href="codigoPHP/ejercicio00.php"></a>Ejecutar MySQLi</td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"></a>Mostrar MySQLi</td>
                    <td>Ejecutar PDO</td>
                    <td>Mostrar PDO</td>
                </tr>
            </table>











        </main>

        <footer>
            <p><a href="../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="indexProyectoTema4.php">Inicio</a> | <a href="https://github.com/discreppo" target="_blank" >GitHub</a></p>
        </footer>
    </body>
</html>