<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Facturas</title>
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
                width: 434px;
            }
        </style>
    </head>
    <body>
        <form action="facturas.php" method="post">
            <table id="tabla1" class="table table-bordered table-striped">
                <tr>
                    <td><label for="num" class="form-label">Número</label></td>
                    <td><input type="number" class="form-control" id="num" name="num" ></td> 
                </tr>
                <tr>
                    <td><label for="fe" class="form-label">Fecha</label></td>
                    <td><input type="datetime" class="form-control" id="fe" name="fe"></td> 
                </tr>
                <tr>
                    <td><label for="de" class="form-label">Documento empleado</label></td>
                    <td><input type="text" class="form-control" id="de" name="de"></td> 
                </tr>
                <tr>
                    <td><label for="dp" class="form-label">Documento persona</label></td>
                    <td><input type="text" class="form-control" id="dp" name="dp"></td> 
                </tr>
                <tr>
                    <td><input type="submit" value="Guardar" class="btn basic btn-warning"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['Número'])) {
            require_once './controlador/conexion.php';
            $num = $_POST['num'];
            $fe = $_POST['fe'];
            $de = $_POST['de'];
            $dp = $_POST['dp'];


            $sql = "INSERT INTO Personas VALUES('$num','$fe','$de','$dp')";

            if ($conn->query($sql) === TRUE) {
                echo "La factura se ha guardado en la base";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </body>
</html>

