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
            function ajax() {
                var cb = document.getElementById("cb").value;
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function () {
                    try {
                        myObj = JSON.parse(this.responseText);
                        document.getElementById("nombre").value = myObj[1];
                        document.getElementById("descripcion").value = myObj[2];
                        
                    } catch (e) {
                        document.getElementById("nombre").value = "";
                        document.getElementById("descripcion").value = "";
                        
                        document.getElementById("ver").innerHTML = this.responseText;
                    }

                }
                xmlhttp.open("POST", "controlador/productosc.php");
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("accion=Consultar&cb=" + cb);

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
        <form action="" method="post" name="enviar">
            <table id="tabla1" class="table table-responsive-lg table-info">
                <tr>
                    <td><label for="cb" class="form-label">Codigó de barras</label></td>
                    <td><input type="text" class="form-control" id="cb" name="cb"></td> 
                </tr>
                <tr>
                    <td><label for="nom" class="form-label">Nombre</label></td>
                    <td><input type="text" class="form-control" id="nom" name="nom"></td> 
                </tr>
                <tr>
                    <td><label for="desc" class="form-label">Descripción</label></td>
                    <td><input type="text" class="form-control" id="desc" name="desc"></td> 
                </tr>
                <tr>
                    <td><input type="button" value="Guardar" class="btn btn-success"  onclick="enviarF('Guardar')"></td>
                    <td><input type="button" value="Actualizar" class="btn btn-dark" onclick="enviarF('Actualizar')"></td>
                </tr>
                <tr>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" onclick="enviarF('Eliminar')"></td>
                    <td><input type="button" value="Consultar" class="btn btn-info" onclick="enviarF('Consultar')"></td>
                </tr>
            </table>
        </form>
        <div id="ver">
        </div>
    </body>
</html>

