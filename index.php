<?php



// Comprobar la version minima requerida

if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('La version minima requerida debe ser 5.3.7 !');
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    
    require_once('librerias/password_compatibility_library.php');
}

// Incluir configuracion
require_once('config/config.php');

// include idioma de mensajes
require_once('idioma/es.php');

// Incluir la libreria para mandar correos
require_once('librerias/PHPMailer.php');

// Cargar la clase login
require_once('clases/Login.php');

// Crear el objeto login

$login = new Login();

// Comprobar si estas logeado
if ($login->isUserLoggedIn() == true) {
    // aqui enviar al generador de torneos
	
    include("vistas/vista_conectado.php");

} else {
    //Enviar para que se logee
    include("vistas/vista_no_conectado.php");
}
