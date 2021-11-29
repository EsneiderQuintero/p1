$(document).ready(function () {
    $('#b_guardar').click(function () {
        var form=document.enviar;
        form.action = "controlador/personasc.php?accion=Guardar";
        var d = $('#Documento').val();
        var pn = $('#pnombre').val();
        var pa = $('#papellido').val();
        if(validarCampos(d,pn,pa)){
            form.submit();
        }
    });
    $('#b_consultar').click(function(){
        var d = $('#Documento').val();
        if(validarDocumento(d)){
            ajax();
        }
    });
    $('#b_eliminar').click(function(){
        var form=document.enviar;
        form.action = "controlador/personasc.php?accion=Eliminar";
        var d = $('#Documento').val();
        if(validarDocumento(d)){
            form.submit();
        }
    });
});
function validarDocumento(d){
    if(d==""){
        $('#s_documento').slideDown('slow');
        return false;
    }else{
        $('#s_documento').slideDown('slow');
        return true;
    }
}
function validarCampos(d,pn,pa){
    
    if(validarDocumento(d)){                       
            return false;
        }
        if(pn==""){
            $('#s_pnombre').slideDown('slow');
            return false;
        }else{
            $('#s_pnombre').slideUp('slow');
        }
        if(pa==""){
            $('#s_papellido').slideDown('slow');
            return false;
        }else{
            $('#s_papellido').slideUp('slow');
        }
        return true;
}
function ajax() {
    var d = document.getElementById("Documento").value;
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
        try {
            myObj = JSON.parse(this.responseText);
            document.getElementById("pnombre").value = myObj[1];
            document.getElementById("snombre").value = myObj[2];
            document.getElementById("papellido").value = myObj[3];
            document.getElementById("sapellido").value = myObj[4];
            document.getElementById("email").value = myObj[5];
        } catch (e) {
            document.getElementById("pnombre").value = "";
            document.getElementById("snombre").value = "";
            document.getElementById("papellido").value = "";
            document.getElementById("sapellido").value = "";
            document.getElementById("email").value = "";
            document.getElementById("ver").innerHTML = this.responseText;
        }

    }
    xmlhttp.open("POST", "controlador/personasc.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("accion=Consultar&Documento=" + d);

}






