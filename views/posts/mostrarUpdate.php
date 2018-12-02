
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<table id="cabezera">

  
    <form action='<?php echo constant('URL'); ?>posts/Update' method="post" enctype="multipart/form-data">
        
        <?php
        $id = $_GET['id'];
   
        ?>

        <strong><input type="hidden" name="id" value=<?php echo $id; ?> readonly></strong>


        <tr>
            <td>
                <p><strong>Modificar título: <input type="text" name="titulo" value='<?php echo $post->titulo ?>' /></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>Modificar autor: <input type="text" name="autor" value='<?php echo $post->author ?>' /></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>Modificar contenido: <input type="text" name="contenido" value='<?php echo $post->content ?>' /></strong></p>
            </td>
        </tr>

        <tr>
            <td>
                <p> <img src="/blog_php_mvc/uploads/<?php echo $post->imagen; ?>" alt="" height="300" width="400" align="middle" /></p>
               
            </td>
        </tr>

        <tr>
            <td>
                <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                <input id="imagen" name="imagen" size="5000" type="file" value='<?php echo $post->imagen ?>' />

            </td>
        </tr>



        <tr>
            <td>
                <p><input type="submit" /></p>
            </td>
        </tr>

    </form>


</table>