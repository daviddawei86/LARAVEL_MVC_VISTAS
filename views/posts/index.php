
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<table id="cabezera">

    <td COLSPAN="5">
        <p><strong>LISTADO DE POSTS</strong></p>
    </td>

    <?php foreach ($posts as $post) { ?>
        <tr>

            <td>
                <?php echo $post->author; ?>
            </td>

            <td>
                <a class="btn btn-success" href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Ver
                    contenido</a>

            </td>
            <td>
                <a class="btn btn-success" href='?controller=posts&action=mostrarUpdate&id=<?php echo $post->id; ?>'>Actualizar
                    post</a>

            </td>

            <td>
                <a class="btn btn-success" href='?controller=posts&action=Borrar&id=<?php echo $post->id; ?>'>Borrar
                    post</a>

            </td>

            </td>
        </tr>
    <?php } ?>

</table>