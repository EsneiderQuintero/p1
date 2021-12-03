<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Productos</title>
        <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/popper.min.js" type="text/javascript"></script>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            function enviar(accion) {
                var form = document.productosF;
                form.action = "controlador/productosC.php?accion=" + accion;
                //form.submit();
                ajax();
            }
            function ajax() {
                var cb = document.getElementById("cb").value;
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function () {
                    try {
                        myObj = JSON.parse(this.responseText);
                        document.getElementById("nombre").value = myObj[1];
                        document.getElementById("descripcion").value = myObj[2];
                        ajaxImg(cb);

                    } catch (e) {
                        document.getElementById("nombre").value = "";
                        document.getElementById("descripcion").value = "";

                        document.getElementById("imgs").innerHTML = this.responseText;
                    }

                }
                xmlhttp.open("POST", "controlador/productosc.php");
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("accion=Consultar&cb=" + cb);

            }
            function ajaxImg(cb) {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function () {
                    document.getElementById("imgs").innerHTML = this.responseText;
                }
                xmlhttp.open("POST", "controlador/productosC.php");
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("accion=ConsultarImg&cb=" + cb);
            }
            function enviarF(accion) {
                var form = document.enviar;
                form.action = "controlador/productosc.php?accion=" + accion;
                var cb = document.getElementById("cb");
                var nom = document.getElementById("nombre");

                var sub = true;
                if (accion == "Guardar") {
                    if (cb.value == "") {
                        sub = false;
                        cb.style = "border-color:red;";
                    }
                    if (nom.value == "") {
                        sub = false;
                        nom.style = "border-color:red;";
                    }

                }
                if (accion == "Eliminar") {
                    if (cb.value == "") {
                        sub = false;
                        cb.style = "border-color:red;";
                    }
                }
                if (accion == "Consultar") {
                    sub = false;
                    if (cb.value == "") {
                        cb.style = "border-color:red;";
                    } else {
                        ajax();
                    }


                }
                if (sub) {
                    form.submit();
                }
            }
        </script>

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
        <?php
        require_once './menu.php';
        ?>
        <form name="productosF" method="post" >
            <table id="tabla1" class="table table-responsive-lg table-info">
                <tr>
                    <td><label for="cb" class="form-label">Codigó de barras</label></td>
                    <td><input type="text" class="form-control" id="cb" name="cb"></td> 
                </tr>
                <tr>
                    <td><label for="nombre" class="form-label">Nombre</label></td>
                    <td><input type="text" class="form-control" id="nombre" name="nombre"></td> 
                </tr>
                <tr>
                    <td><label for="descripcion" class="form-label">Descripción</label></td>
                    <td><input type="text" class="form-control" id="descripcion" name="descripcion"></td> 
                </tr>
                <tr>
                    <td><input type="button" value="Guardar" class="btn btn-success"  onclick="enviarF('Guardar')"></td>
                    <td><input type="button" value="Actualizar" class="btn btn-dark" onclick="enviarF('Actualizar')"></td>
                </tr>
                <tr>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" onclick="enviarF('Eliminar')"></td>
                    <td><input name="accion" id="consultar" type="button" value="Consultar" class="btn btn-info" onclick="ajax()"></td>
                </tr>
            </table>

            <div id="imgs">
            </div>
        </form>
        <hr/>
    </body>
</html>

