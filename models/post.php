<?php

class Post {

// definimos todos los atributos
// los declaramos como públicos para acceder directamente $post->author
    public $id;
    public $author;
    public $content;
    public $titulo;
    public $created;
    public $modified;
    public $imagen;

    public function __construct($id, $author, $content, $titulo, $created, $modified, $imagen) {
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
        $this->titulo = $titulo;
        $this->created = $created;
        $this->modified = $modified;
        $this->imagen = $imagen;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');
// creamos una lista de objectos post y recorremos la respuesta de la consulta
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['author'], $post['content'], $post['titulo'], $post['created'], $post['modified'], $post['imagen']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();

        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
// preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        return new Post($post['id'], $post['author'], $post['content'], $post['titulo'], $post['created'], $post['modified'], $post['imagen']);
    }

    //Definimos el formato para la fecha a continuación hacemos la sentencia INSERT con los parametros y ejecutamos.
    public static function añadir($autor, $contenido, $titulo, $imagen) {
        $db = Db::getInstance();

        $timestamp = date('Y-m-d H:i:s');

        $req = $db->prepare("INSERT INTO posts (author, content,titulo,imagen,created,modified) VALUES (?,?,?,?,?,?)");
        $req->bindParam(1, $autor);
        $req->bindParam(2, $contenido);
        $req->bindParam(3, $titulo);
        $req->bindParam(4, $imagen);
        $req->bindParam(5, $timestamp);
        $req->bindParam(6, $timestamp);

        $req->execute();
    }

    //Comprobamos el tipo,nombre,tamaño de la imagen si todo es correcto subida la imagen en una ruta y lo devolvera.
    public static function comprobarImagen($nombre_img, $tipo, $tamano) {

        //Si existe imagen y tiene un tamaño correcto,indicamos los formatos que permitimos subir a nuestro servidor.
        if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 900000000000)) {           
            if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")) {
                // Ruta donde se guardarán las imágenes que subamos.
                $directorio = $_SERVER['DOCUMENT_ROOT'] . "/blog_php_mvc/uploads/";
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);
            } else {
                echo "No se puede subir una imagen con ese formato ";
            }
        } else {

            if ($nombre_img == !NULL)
                echo "La imagen es demasiado grande ";
        }

        return $nombre_img;
    }

    // Definimos formato para la fecha y hacemos la sentencia update. Si la imagen no la cambiamos será la misma.
    public static function update($titulo, $autor, $contenido, $imagen, $id) {
        $db = Db::getInstance();


        if ($imagen != "") {
            $timestamp = date('Y-m-d H:i:s');
            $req = $db->prepare("UPDATE posts SET modified=:modified, titulo=:titulo, imagen=:imagen, author=:author, content =:content WHERE id=:id");
            $req->execute(array('modified' => $timestamp, 'titulo' => $titulo, 'imagen' => $imagen, 'author' => $autor, 'content' => $contenido, 'id' => $id));
        } else {
            $timestamp = date('Y-m-d H:i:s');
            $req = $db->prepare("UPDATE posts SET modified=:modified, titulo=:titulo, author=:author, content =:content WHERE id=:id");
            $req->execute(array('modified' => $timestamp, 'titulo' => $titulo, 'author' => $autor, 'content' => $contenido, 'id' => $id));
        }
    }

    //Utilizando la id que enviamos por parametro para borrar el post
    public static function borrar($id) {
        $db = Db::getInstance();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $req = $db->prepare("DELETE FROM posts WHERE id=:id");
            $req->execute(array('id' => $id));
        }
    }
   //Métodos para la paginacion , la funcionalidad no la hice.
    public function readAll($from_record_num, $records_per_page) {

        $query = "SELECT * FROM posts        
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function countAll() {

        $query = "SELECT id FROM posts";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }

}

?>