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
            case "ConsultarImg":
                $this->consultarImagenes();
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
    function consultarImagenes(){
        require_once '../controlador/conexion.php';
        $sql = "SELECT * FROM fotos where productoscb='" . $_POST['cb'] . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?>
            <!-- Carousel -->
            <div class="m-0 row justify-content-center">
                <div id="demo" class="carousel slide" data-bs-ride="carousel" style="width: 400px">



                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <?php
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            $a = $i == 0 ? "active" : "";
                            echo '<div class="carousel-item ' . $a . '">';
                            echo '<img src="img/' . $row['foto'] . '" alt="' . $row['df'] . '" class="d-block w-100" style="width:300px">';
                            echo '</div>';
                            $i++;
                        }
                        ?>
                    </div>
                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        <?php
                        for ($j = 0; $j < $i; $j++) {
                            $a = $j == 0 ? "active" : "";
                            echo '<button type="button" data-bs-target="#demo" data-bs-slide-to="' . $j . '" class="' . $a . '"></button>';
                        }
                        ?>
                    </div>
                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <?php
        } else {
            Mensajes::info("El producto no tiene imágenes");
        }
        $conn->close();
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
        if (isset($_POST['cb'])) {

            $this->setCb($_POST['cb']);
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
