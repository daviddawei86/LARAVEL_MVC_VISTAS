<?php

class PostsController {

    public function index() {
// Guardamos todos los posts en una variable
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    public function show() {
// esperamos una url del tipo ?controller=posts&action=show&id=x
// si no nos pasan el id redirecionamos hacia la pagina de error, el id tenemos
// que buscarlo en la BBDD

        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
// utilizamos el id para obtener el post correspondiente
        $post = Post::find($_GET['id']);

        require_once('views/posts/show.php');
    }

    //Cuando apretamos boton añadir indicaremos a routes ir a la función añadir que este cargara la vista de mostrarInsertar.
    public function añadir() {

        require_once('views/posts/mostrarInsertar.php');
    }

//La función añadirInsert recibe los post de mostrarInsertar y hacemos la comprobación de la imagen.
    public function añadirInsert() {

        // Recibo los datos de la imagen
        $nombre_img = $_FILES['imagen']['name'];
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        
        
        $post = Post::comprobarImagen( $nombre_img,$tipo, $tamano );
        
        $_POST["imagen"]= $nombre_img;

// Enviamos nuestros post a la función añadir en el php de post.php.Cuando inserte volvera a mostrarInsert.php
        $post = Post::añadir($_POST["autor"], $_POST["contenido"], $_POST["titulo"], $_POST["imagen"]);

        require_once('views/posts/mostrarInsertar.php');
    }

    //Cuando apretamos boton update indicaremos a routes ir a la función mostrarUpdate que este cargara la vista de mostrarUpdate.
    public function mostrarUpdate() {

        if (!isset($_GET['id'])) {
          
            return call('pages', 'error');
        }
// utilizamos el id para obtener el post correspondiente
        $post = Post::find($_GET['id']);

        require_once('views/posts/mostrarUpdate.php');
    }

//La función Update recibe los post de mostrarUpdate y hacemos la comprobación de la imagen nueva.
    public function Update() {

           // Recibo los datos de la imagen
        $nombre_img = $_FILES['imagen']['name'];
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        
        
        $post = Post::comprobarImagen( $nombre_img,$tipo, $tamano );
        
        $_POST["imagen"]= $nombre_img;
        
        //Envia los post a la función update en post.php , cuando hace el update vuelve a mostrar la lista de post.
        $post = Post::update($_POST["titulo"], $_POST["autor"], $_POST["contenido"], $_POST["imagen"], $_POST["id"]);

        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    //Enviamos la id a la función borrar de post.php y volvera al index
    public function Borrar() {

        $post = Post::borrar($_GET["id"]);

        $posts = Post::all();
        require_once('views/posts/index.php');
    }
}
?>

