<?php

require_once '../modelo/productosM.php';
require_once './Mensajes.php';

class Productosc extends Productos {

    function __construct() {
        switch ($_REQUEST['accion']) {
            case "Guardar":
                $this->head();
                $this->registrar();
                $this->footer();
                break;
            case "Actualizar":
                $this->head();
                $this->actualizar();
                $this->footer();
                break;
            case "Eliminar":
                $this->head();
                $this->eliminar();
                $this->footer();
                break;
            case "Consultar":
                $this->consultar();
                break;
            default:
                break;
        }
    }

    function head() {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <link href="../bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="../bootstrap-5.1.3-dist/js/popper.min.js" type="text/javascript"></script>
        <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js" type="text/javascript"></script>
        </head>
        <body>';
    }

    function footer() {
        echo '</body>
        </html>';
    }

    function consultar() {
        if ($this->validarDatos()) {
            $sql = "SELECT * FROM Productos  WHERE cb='" . $this->getcb() . "'";
            $this->ejecutarSelect($sql);
        }
    }

    function eliminar() {
        if ($this->validarDatos()) {
            $sql = "DELETE FROM Productos  WHERE cb='" . $this->getCb() . "'";
            $this->ejecutarQuery($sql, "El producto se ha eliminado en la base.");
        } else {
            Mensajes::info("Faltan datos, no se pudo registrar");
        }
    }

    function registrar() {
        if ($this->validarDatos()) {
            $sql = "INSERT INTO Productos VALUES('" . $this->getcb() . "','" . $this->getnombre() . "','" . $this->getdescripcion() . "')";
            $this->ejecutarQuery($sql, "El producto se ha registrado en la base.");
        } else {
            Mensajes::info("Faltan datos, no se pudo registrar");
        }
    }

    function actualizar() {
        if ($this->validarDatos()) {
            $sql = "UPDATE Productos SET  nombre='" . $this->getNombre() . "' , descripcion='" . $this->getDescripcion() . "' WHERE cb='" . $this->getCb() . "'";
            $this->ejecutarQuery($sql, "El producto se ha actualizado en la base.");
        } else {
            Mensajes::info('Los datos no se pueden actualizar.');
        }
    }

    function ejecutarSelect($sql) {
        require_once 'conexion.php';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $p = array($row['cb'], $row['nombre'], $row['descripcion']);

                $myJSON = json_encode($p);

                echo $myJSON;
            }
        } else {
            Mensajes::info("No hay resultados");
        }
        $conn->close();
    }

    function ejecutarQuery($sql, $msj) {
        require_once 'conexion.php';
        if ($conn->query($sql) === TRUE) {
            Mensajes::success($msj);
        } else {
            Mensajes::danger($conn->error);
        }

        $conn->close();
    }

    function validarDatos() {
        if (isset($_POST[Cb])) {

            $this->setCb($_POST['Cb']);
            if ($_REQUEST['accion'] != "Consultar") {
                $this->setnombre($_POST['nombre']);
                $this->setdescripcion($_POST['descripcion']);
            }

            return true;
        } else {
            return false;
        }
    }

}

new Productosc();
?>
