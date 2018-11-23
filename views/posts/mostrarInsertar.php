
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<table id="cabezera">



    <form action="?controller=posts&action=añadirInsert" method="post" enctype="multipart/form-data">

        
        
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