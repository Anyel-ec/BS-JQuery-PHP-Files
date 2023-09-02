<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cita = $_POST["cita"];
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $nomMascota = $_POST["nomMascota"];
    $edad = $_POST["edad"];
    $raza = $_POST["raza"];
    $color = $_POST["color"];
    $sexo = $_POST["sexo"];
    $sintomas = $_POST["sinto"];

    $datos = "Cita: $cita\nNombre: $nombre\nCédula: $cedula\nCorreo: $email\nTeléfono: $telefono\nDirección: $direccion\nNombre de Mascota: $nomMascota\nEdad de Mascota: $edad\nRaza: $raza\nColor: $color\nSexo: $sexo\nSíntomas: $sintomas\n\n";

    $archivo = fopen("datos.txt", "a"); // Abre el archivo en modo "a" para añadir contenido
    fwrite($archivo, $datos); // Escribe los datos en el archivo
    fclose($archivo); // Cierra el archivo

    echo "Datos guardados correctamente.";
} else {
    echo "Acceso no permitido.";
}
?>
