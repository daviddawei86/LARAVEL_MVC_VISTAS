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
        //     que buscarlo en la BBDD
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
// utilizamos el id para obtener el post correspondiente
        $post = Post::find($_GET['id']);

        require_once('views/posts/show.php');
    }

    public function añadir() {

        require_once('views/posts/mostrarInsertar.php');
    }

    public function añadirInsert() {


        $post = Post::añadir($_POST["autor"], $_POST["contenido"]);

        require_once('views/posts/mostrarInsertar.php');
    }

    public function mostrarUpdate() {

        require_once('views/posts/mostrarUpdate.php');
    }

    public function Update() {


        $post = Post::update($_POST["autor"], $_POST["contenido"],$_POST["id"]);

        $posts = Post::all();
        require_once('views/posts/index.php');
    }

     public function Borrar() {


        $post = Post::borrar($_GET["id"]);

        $posts = Post::all();
        require_once('views/posts/index.php');
    }
}
?>

