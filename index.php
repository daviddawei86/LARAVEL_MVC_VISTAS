<?php

//Establecemos la conexión llamando connection.php
require_once('connection.php');

//Si enviamos valores por GET asignaremos estos valores a una variable, si ya existen activa el home con nuestro nombre.
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}
//carga el layout principal 
require_once('views/layout.php');
?>
