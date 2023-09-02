<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $ocupacion = $_POST["ocupacion"];
    $numPersonas = $_POST["numPersonas"];
    $domicilio = $_POST["domicilio"];
    $mensaje = $_POST["mensaje"];

    // Crear una cadena con los datos del formulario
    $datosFormulario = "Nombre: $nombre\nCédula: $cedula\nEmail: $email\nTeléfono: $telefono\nDirección: $direccion\nOcupación: $ocupacion\nPersonas en el hogar: $numPersonas\nTipo de inmueble: $domicilio\nMensaje: $mensaje\n";

    // Guardar los datos en un archivo
    $archivo = "datos_formulario.txt";

    if (file_put_contents($archivo, $datosFormulario, FILE_APPEND)) {
        echo "Datos guardados exitosamente.";
    } else {
        echo "Error al guardar los datos.";
    }
    
}
?>
