<DOCTYPE html>
    <html>
        <head>
            <style>
                /* CSS Introducimos los estilos para dar forma y color a nuestra cabezera(color,alineaación,padding,tamaño) 
                la id de nuestra tabla es #cabezera
                */
                #cabezera {
                    font-family: Comic Sans MS;
                    border-collapse: collapse;
                    width: 55%;
                    margin-left: auto;
                    margin-right: auto;

                }
                /* Definimos dos estilos diferentes para nuestros td y th */
                #cabezera td, #cabezera th {

                    padding: 8px;
                    background-color: #DEB887;
                    font-size: 18px;
                    text-align: left;

                }
                #cabezera th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: center;
                    background-color: #DC143C;
                    color: white;
                }
                /* Formato para nuestros hipervinculos */
                a:link {
                    /* enlace no visitado*/
                    color:black;
                }
                a:visited {
                    /* enlace visitado */
                    color:black;
                }

            </style>
        </head>
        <body>
            <header>
                <?php require 'header.php' ?>

            </header>
            <?php require_once('routes.php'); ?>
            <footer>

                   
                <?php require 'footer.php' ?>


            </footer>
        </body>
    </html>
