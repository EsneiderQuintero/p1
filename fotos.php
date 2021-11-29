<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Fotos</title>
        <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/popper.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <style type="text/css">

        </style>
    </head>
    <body>
        <?php
        require_once './menu.php';
        ?>
        <form action="controlador/fotosc.php" method="post" enctype="multipart/form-data">
            <table id="tabla1" style="width:  400px" class="table table-hover table-bordered">
                <tr>
                    <td><label for="id">Id</label></td>
                    <td><input type="number" id="id" name="id" class="form control"></td> 
                </tr>
                <tr>
                    <td><label for="df">Descripción fotos</label></td>
                    <td><textarea type="text" id="df" name="df" class="form control">
                        </textarea></td> 
                </tr>
                <tr>
                    <td><label for="foto">Foto</label></td>
                    <td><input type="file" id="foto" name="foto" class="form control"></td> 
                </tr>
                <tr>
                    <td><label for="pc">Producto cb</label></td>
                    <td><input type="text" id="pc" name="pc" class="form control"></td> 
                </tr>

                <tr>
                    <td><input type="submit" name="submit" value="Guardar" class="btn btn-secondary"></td>
                    <td></td>
                </tr>
            </table>
        </form>

    </body>
</html>


