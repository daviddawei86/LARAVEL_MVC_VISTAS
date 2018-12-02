<?php

//Establecemos la conexión llamando connection.php
require_once('connection.php');

define('URL', 'http://localhost/blog_php_mvc/');
if (isset($_GET['url'])) {
    $url = $_GET['url']; // 'posts/index'
// Quita / innecesarias a la derecha.
    $url = rtrim($url, '/');
// Devuelve un array utilizando la / como delimitador.
// Devuelve un array utilizando la / como delimitador.
    $url = explode('/', $url); // ['posts', 'index']

    $controller = $url[0];
    $action = $url[1];
    
} else {
    $controller = 'pages';
    $action = 'home';
}


//carga el layout principal 
require_once('views/layout.php');
?>
