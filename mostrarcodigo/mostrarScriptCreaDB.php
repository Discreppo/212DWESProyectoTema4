<!DOCTYPE html>
<html lang="es">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oscar Pascual Ferrero</title>
        <style>

            body {
                display: flex;
                flex-direction: column;
            }
            header{
                position: fixed;
                top: 0;
                width: 100%;
                background-color: #fff;
            }
            main{
                margin-top: 10%;
            }
            footer{
                bottom: 0;
                text-align: center;
                width: 100%;
                background-color: lightgray;
            }
            table {
                border-collapse: collapse;
                width: 70%;
                margin-bottom: 15%;


            }

            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #333;
                color: white;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Código Script Crea</h1>
        </header>

        <main>
            <!-- Contenido principal de tu sitio web -->
           <pre>
        <code>
            <?php
            $ruta_archivo_sql = '../scriptDB/CreaDB212DWESProyectoTema4.sql';
            if (file_exists($ruta_archivo_sql)) {
                echo htmlspecialchars(file_get_contents($ruta_archivo_sql));
            } else {
                echo 'El archivo SQL no existe.';
            }
            ?>
        </code>
    </pre>

        </main>

        <footer>
            <p><a href="../../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="../indexProyectoTema4.php">Inicio</a> | <a href="https://github.com/discreppo" target="_blank" >GitHub</a></p>
        </footer>
    </body>
</html>