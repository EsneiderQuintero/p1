<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Precios</title>
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
        <?php
        require_once './menu.php';
        ?>
        <form action="precios.php" method="post">
            <table id="tabla1">
                <tr>
                    <td><label for="cb">Codigó de barras</label></td>
                    <td><input type="text" id="cb" name="cb"></td> 
                </tr>
                <tr>
                    <td><label for="fi">Fecha inicio</label></td>
                    <td><input type="datetime" id="fi" name="fi"></td> 
                </tr>
                <tr>
                    <td><label for="ff">Fecha final</label></td>
                    <td><input type="datetime" id="ff" name="ff"></td> 
                </tr>
                <tr>
                    <td><label for="pr">Precio</label></td>
                    <td><input type="decimal" id="pr" name="pr"></td> 
                </tr>
                <tr>
                    <td><input type="submit" value="Guardar"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['Codigó de barras'])) {
            require_once './controlador/conexion.php';
            $cb = $_POST['cb'];
            $fi = $_POST['fi'];
            $ff = $_POST['ff'];
            $pr = $_POST['pr'];


            $sql = "INSERT INTO Personas VALUES('$cb','$fi','$ff','$pr')";

            if ($conn->query($sql) === TRUE) {
                echo "El precio se ha guardado en la base";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </body>
</html>


