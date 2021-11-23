<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Fotos</title>

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
        <form action="fotos.php" method="post">
            <table id="tabla1">
                <tr>
                    <td><label for="ide">Id</label></td>
                    <td><input type="number" id="ide" name="ide"></td> 
                </tr>
                <tr>
                    <td><label for="df">Descripción fotos</label></td>
                    <td><input type="text" id="df" name="df"></td> 
                </tr>
                <tr>
                    <td><label for="fo">Foto</label></td>
                    <td><input type="text" id="fo" name="fo"></td> 
                </tr>
                <tr>
                    <td><label for="pc">Producto cb</label></td>
                    <td><input type="text" id="pc" name="pc"></td> 
                </tr>
                
                <tr>
                    <td><input type="submit" value="Guardar"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['Id'])) {
            require_once './controlador/conexion.php';
            $ide = $_POST['ide'];
            $df = $_POST['df'];
            $fo= $_POST['fo'];
            $pc = $_POST['pc'];


            $sql = "INSERT INTO Personas VALUES('$ide','$df','$fo','$pc')";

            if ($conn->query($sql) === TRUE) {
                echo "La foto se ha guardado en la base";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </body>
</html>


