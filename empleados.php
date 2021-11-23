<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Empleados</title>
        <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="../../../Users/Natalia/Documents/librerias1/bootstrap-5.1.3-dist/js/popper.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <style type="text/css">
            input{
                padding: 5px;
                text-align: center;
                font-family: cursive;
            }
            #tabla1{
                width: 400px;
            }
        </style>
    </head>
    <body>
        <form action="empleados.php" method="post">
            <table id="tabla1" class="table table-active table-sm">
                <tr>
                    <td><label for="Documento">Documento</label></td>
                    <td><input type="number" id="Documento" name="Documento"></td> 
                </tr>
                <tr>
                    <td><label for="Clave">Clave</label></td>
                    <td><input type="text" id="Clave" name="Clave"></td> 
                </tr>
                <tr>
                    <td><input type="submit" value="Guardar" class="btn btn-danger btn-block"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['Documento'])) {
            require_once './controlador/conexion.php';
            $documento = $_POST['Documento'];
            $clave = $_POST['Clave'];


            $sql = "INSERT INTO Personas VALUES('$documento','$clave')";

            if ($conn->query($sql) === TRUE) {
                echo "El empleado se ha guardado en la base";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </body>
</html>
