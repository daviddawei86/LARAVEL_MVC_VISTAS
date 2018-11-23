<table id="cabezera">

    <tr>
        <td>
            <p><strong>Post #<?php echo $post->id; ?></strong></p>
        </td>
    </tr>
    
    <tr>
        <td>
            <p><strong> Titulo : <?php echo $post->titulo; ?></strong></p>
        </td>
    </tr>


    <tr>
        <td>
            <p><strong>Autor: </strong><?php echo $post->author; ?></p>
        </td>
    </tr>

    <tr>
        <td>
            <p><strong>Contenido: </strong><?php echo $post->content; ?></p>
        </td>
    </tr>
    
     <tr>
        <td>
            <p><strong>Creado: </strong><?php echo $post->created; ?></p>
        </td>
    </tr>
    
     <tr>
        <td>
            <p><strong>Modificado: </strong><?php echo $post->modified; ?></p>
        </td>
    </tr>
    
    <tr>
        <td>
            <p> <img src="/blog_php_mvc/uploads/<?php echo $post->imagen;  ?>" alt="" height="300" width="400" align="middle" /></p>
        </td>
    </tr>
   

</table>
