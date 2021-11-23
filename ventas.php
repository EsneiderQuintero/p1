<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Ventas</title>
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
                border: 1px solid black;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <form action="ventas.php" method="post">
            <table id="tabla1">
                <tr>
                    <td><label for="numerof">Número de factura</label></td>
                    <td><input type="number" id="numerof" name="numerof"></td> 
                </tr>
                <tr>
                    <td><label for="cb">Codigó de barras</label></td>
                    <td><input type="text" id="cb" name="cb"></td> 
                </tr>
                <tr>
                    <td><label for="cant">Cantidad</label></td>
                    <td><input type="number" id="cant" name="cant"></td> 
                </tr>
                <tr>
                    <td><input type="submit" value="Guardar"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['cb'])) {
            require_once './controlador/conexion.php';
            $numerof = $_POST['numerof'];
            $cb = $_POST['cb'];
            $cant = $_POST['cant'];


            $sql = "INSERT INTO Personas VALUES('$numerof','$cb','$cant')";

            if ($conn->query($sql) === TRUE) {
                echo "La venta se ha guardado en la base";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </body>
</html>


