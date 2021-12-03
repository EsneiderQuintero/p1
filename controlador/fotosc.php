<html>
    <head>
        <link href="../bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
</html>


<?php
require_once 'Mensajes.php';
$target_dir = "../img/";
$imageFileType = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
$nombreArchivo = basename($_POST['id'] . '-' . $_POST['pc'] . '.' . $imageFileType);
$target_file = $target_dir . $nombreArchivo;
$uploadOk = 1;


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["foto"]["size"] > 500000) {
    Mensajes::danger("Sorry, your file is too large.");
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    Mensajes::danger("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    Mensajes::danger("Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        require_once './conexion.php';
        $sql = "INSERT INTO fotos VALUES('" . $_POST['id'] . "','" . $nombreArchivo . "','" . $_POST['df'] . "','" . $_POST['pc'] . "')";
        if ($conn->query($sql) === true) {
            Mensajes::success("La foto se ha subido y registrado");
        }
        $conn->close();
    } else {
        Mensajes::danger("Hubo un error en la descarga");
    }
}
?>
