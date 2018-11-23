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

        // Recibo los datos de la imagen
        $nombre_img = $_FILES['imagen']['name'];
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];

//Si existe imagen y tiene un tamaño correcto
        if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 900000000000)) {
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")) {
                // Ruta donde se guardarán las imágenes que subamos
                $directorio = $_SERVER['DOCUMENT_ROOT'] . "/blog_php_mvc/uploads/";
                // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);

                $_POST["imagen"] = $nombre_img;
            } else {
                //si no cumple con el formato
                echo "No se puede subir una imagen con ese formato ";
            }
        } else {
            //si existe la variable pero se pasa del tamaño permitido
            if ($nombre_img == !NULL)
                echo "La imagen es demasiado grande ";
        }


        $post = Post::añadir($_POST["autor"], $_POST["contenido"], $_POST["titulo"], $_POST["imagen"]);

        require_once('views/posts/mostrarInsertar.php');
    }

    public function mostrarUpdate() {

        require_once('views/posts/mostrarUpdate.php');
    }

    public function Update() {

        // Recibo los datos de la imagen
        $nombre_img = $_FILES['imagen']['name'];
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];

//Si existe imagen y tiene un tamaño correcto
        if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 900000000000)) {
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")) {
                // Ruta donde se guardarán las imágenes que subamos
                $directorio = $_SERVER['DOCUMENT_ROOT'] . "/blog_php_mvc/uploads/";
                // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);

                $_POST["imagen"] = $nombre_img;
            } else {
                //si no cumple con el formato
                echo "No se puede subir una imagen con ese formato ";
            }
        } else {
            //si existe la variable pero se pasa del tamaño permitido
            if ($nombre_img == !NULL)
                echo "La imagen es demasiado grande ";
        }


        $post = Post::update($_POST["titulo"],$_POST["autor"], $_POST["contenido"],$_POST["imagen"],$_POST["id"]);

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

