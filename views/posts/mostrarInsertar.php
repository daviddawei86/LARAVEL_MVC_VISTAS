
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<!-- Enviamos formulario con sus inputs enviando el posta&action que esta vez nos lleve a la función añadirInsert del controlador-->
<table id="cabezera">
    <form action='<?php echo constant('URL'); ?>posts/añadirInsert' method="post" enctype="multipart/form-data">
       
         <tr>
            <td>
                <p><strong>Añadir titulo: <input type="text" name="titulo" /></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>Añadir autor: <input type="text" name="autor" /></strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>Añadir contenido: <input type="text" name="contenido" /></strong></p>
            </td>
        </tr>

        <tr>
            <td>
                <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                <input id="imagen" name="imagen" size="5000" type="file" />

            </td>
        </tr>

        <tr>
            <td>
                <p><input type="submit" /></p>
            </td>
        </tr>
    </form>
</table>