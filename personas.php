<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Personas</title>
        <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/popper.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/jquery.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/personas.js" type="text/javascript"></script>
        
        <style type="text/css">
            input{
                padding: 5px;
                text-align: center;
                font-family: cursive;
            }
            #tabla1{
                width: 434px;
            }
            .ocultar{
                display: none;
            }

        </style>
    </head>
    <body>
        <?php
        require_once './menu.php';
        ?>
        <form action="" method="post" name="enviar">
            <table id="tabla1" class="table table-hover ">
                <tr>
                    <td><label for="Documento" class="form-label">Documento</label></td>
                    <td>
                        <input type="number" class="form-control" id="Documento" name="Documento">
                        <span id="s_documento" class="ocultar text-danger">Campo obligatorio</span>
                    </td> 
                </tr>
                <tr>
                    <td><label for="pnombre" class="form-label">Primer nombre</label></td>
                    <td>
                        <input type="text" class="form-control" id="pnombre" name="pnombre">
                        <span id="s_pnombre" class="ocultar text-danger">Campo obligatorio</span>
                    </td> 
                </tr>
                <tr>
                    <td><label for="snombre" class="form-label">Segundo nombre</label></td>
                    <td><input type="text" class="form-control" id="snombre" name="snombre"></td> 
                </tr>
                <tr>
                    <td><label for="papellido" class="form-label">Primer apellido</label></td>
                    <td>
                        <input type="text" class="form-control" id="papellido" name="papellido">
                        <span id="s_papellido" class="ocultar text-danger">Campo obligatorio</span>
                    </td> 
                </tr>
                <tr>
                    <td><label for="sapellido" class="form-label">Segundo apellido</label></td>
                    <td><input type="text" class="form-control" id="sapellido" name="sapellido"></td> 
                </tr>
                <tr>
                    <td><label for="email" class="form-label">Email</label></td>
                    <td><input type="email" class="form-control" id="email" name="email"></td> 
                </tr>
                <tr>
                    <td><input type="button" value="Guardar" class="btn btn-success"  id="b_guardar"></td>
                    <td><input type="button" value="Actualizar" class="btn btn-dark" onclick="enviarF('Actualizar')"></td>
                </tr>
                <tr>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" id="b_eliminar"></td>
                    <td><input type="button" value="Consultar" class="btn btn-info" id="b_consultar"></td>
                </tr>
            </table>    
        </form>
        <div id="ver">
        </div>
    </body>
</html>

