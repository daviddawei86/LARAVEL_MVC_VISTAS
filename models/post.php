<?php

class Post {

// definimos tres atributos
// los declaramos como públicos para acceder directamente $post->author
    public $id;
    public $author;
    public $content;
    public $titulo;
    public $created;
    public $modified;
    public $imagen;

    public function __construct($id, $author, $content,$titulo,$created,$modified,$imagen) {
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
            $list[] = new Post($post['id'], $post['author'], $post['content'],$post['titulo'],$post['created'],$post['modified'],$post['imagen']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
// nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
// preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        return new Post($post['id'], $post['author'], $post['content'], $post['titulo'],$post['created'],$post['modified'],$post['imagen']);
    }

    public static function añadir($autor, $contenido,$titulo, $imagen) {
        $db = Db::getInstance();
       
        $timestamp=date('Y-m-d H:i:s');
        
        $req = $db->prepare("INSERT INTO posts (author, content,titulo,imagen,created,modified) VALUES (?,?,?,?,?,?)");
        $req->bindParam(1, $autor);
        $req->bindParam(2, $contenido);
        $req->bindParam(3, $titulo);
        $req->bindParam(4, $imagen);
        $req->bindParam(5, $timestamp);
        $req->bindParam(6, $timestamp);
       
        $req->execute();
    }
    
      public static function update($titulo,$autor, $contenido,$imagen,$id) {
        $db = Db::getInstance();
       
        $timestamp=date('Y-m-d H:i:s');
        
        $req = $db->prepare("UPDATE posts SET modified=:modified, titulo=:titulo, imagen=:imagen, author=:author, content =:content WHERE id=:id");
        $req->execute(array('modified' => $timestamp,'titulo' => $titulo,'imagen' => $imagen,'author' => $autor,'content' => $contenido,'id' => $id));

    }
    
      public static function borrar($id) {
        $db = Db::getInstance();
       
        
        $req = $db->prepare("DELETE FROM posts WHERE id=:id");
        $req->execute(array('id' => $id));
             

    }

}

?>