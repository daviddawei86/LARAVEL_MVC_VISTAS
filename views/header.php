

<!-- Ponemos en nuestro header el hiperenlace que indicara a routes que vaya a la función añadir en el post_controller -->
<table id="cabezera">
    <tr>
        <th>
          <!-- <a href='/blog_php_mvc'>Home</a> -->
          <a href='<?php echo constant('URL'); ?>'>Home</a>
        </th>
        <th>
          <!--  <a href='?controller=posts&action=index'>Posts</a>  -->
            <a href='<?php echo constant('URL'); ?>posts/index'>Posts</a>
        </th>
        <th>
            <a class="btn btn-success" href='<?php echo constant('URL'); ?>posts/añadir' class='btn btn-default pull-right'>Añadir Post</a>
        </th>
    </tr>
</table> 

