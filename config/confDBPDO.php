<?php

/**
 * @author Oscar Pascual Ferrero
 * @version 1.1 
 * @since 08/11/2023
 */
    
if ($_SERVER['SERVER_NAME'] == 'daw212.isauces.local') {
    define('DSN', 'mysql:host=192.168.20.19;dbname=DB212DWESProyectoTema4'); // Host 'IP' y nombre de la base de datos
    define('USERNAME','user212DWESProyectoTema4'); // Nombre de usuario de la base de datos
    define('PASSWORD','paso'); // Contraseña de la base de datos
    // Archivo de configuración de la BD de Explotación
    } elseif ($_SERVER['SERVER_NAME'] == 'daw212.ieslossauces.es') {
        define('DSN', 'mysql:host=db5014806792.hosting-data.io;dbname=dbs12302449'); // Host y nombre de la base de datos
        define('USERNAME','dbu2959127'); // Nombre de usuario de la base de datos
        define('PASSWORD','daw2_Sauces'); // Contraseña de la base de datos
    }