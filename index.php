<?php

//Establecemos la conexión llamando connection.php
require_once('connection.php');

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;



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
