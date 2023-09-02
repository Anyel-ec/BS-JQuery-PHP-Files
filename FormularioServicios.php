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
        // Mostrar una alerta en el navegador
        echo '<script>alert("Datos guardados exitosamente.");</script>';
    } else {
        // Mostrar una alerta en el navegador en caso de error
        echo '<script>alert("Error al guardar los datos.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulafio de Adopcion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="stylesheet" href="css/inicio.css">
    <script src="JS/jQuery v3.7.0.js"></script>
    <script src="JS/jQuery Easing v1.3.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <!--Libreria-->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $("#formValidar").validate({

                rules: {
                    nombre: {
                        minlength: 3
                    },
                    direccion: {
                        minlength: 3
                    },

                    email: {
                        email: true
                    },
                    telefono: {
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    ocupacion: {
                        minlength: 3,
                        required: true
                    },
                    cedula: {
                        required: true,
                        cedulaEcuatoriana: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    numPersonas: {
                        number: true
                    },
                    mascota: {
                        required: true
                    },
                    domicilio: {
                        required: true
                    },
                    mensaje: {
                        required: true
                    },
                    pdfFile: {
                        required: true
                    }
                },

                messages: {
                    nombre: {
                        required: "",
                        minlength: ""
                    },
                    cedula: {
                        required: "",
                        minlength: ""
                    },
                    direccion: {
                        required: "",
                        minlength: ""
                    },
                    email: "",
                    telefono: {
                        required: "",
                        minlength: ""
                    },
                    numPersonas: "",
                    ocupacion: "",
                    domicilio: "",
                    mensaje: "",
                    condiciones: "Marque la opción",
                    mascota: "Seleccione una opción",
                    pdfFile: {
                        required: ""
                    }
                },

                highlight: function (element) {
                    // Agregar clases de Bootstrap al campo de entrada con error
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element) {
                    // Eliminar clases de Bootstrap del campo de entrada cuando se resuelve el error
                    $(element).removeClass("is-invalid");
                },
                errorElement: "span",
                errorPlacement: function (error, element) {
                    // Mostrar el mensaje de error debajo del campo de entrada
                    error.addClass("error-message");
                    error.insertAfter(element);
                },

                submitHandler: function (form) {
                    // Verificar si el campo de archivo PDF se seleccionó
                    if ($("#pdfFile").get(0).files.length === 0) {
                        alert("Seleccione un archivo PDF para cargar.");
                        return false;
                    }
                    form.submit();
                }
            });

            $.validator.addMethod("cedulaEcuatoriana", function (value, element) {
                // Validar la cédula ecuatoriana
                var cedula = value.trim();
                if (cedula.length !== 10) {
                    return false;
                }

                var coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
                var total = 0;

                for (var i = 0; i < coeficientes.length; i++) {
                    var producto = coeficientes[i] * parseInt(cedula.charAt(i));
                    total += producto >= 10 ? producto - 9 : producto;
                }

                var digitoVerificador = 10 - (total % 10);
                if (digitoVerificador === 10) {
                    digitoVerificador = 0;
                }

                return parseInt(cedula.charAt(9)) === digitoVerificador;
            }, "Ingrese una cédula válida");

        });

    </script>

    <style>
        header {
            background: #276955;
            color: white;
        }

        footer {
            background: #276955;
            color: white;
        }

        .navbar-brand,
        .nav-link {
            color: white;
            text-align: justify;
        }

        .col {
            text-align: justify;
            color: white;
        }

        .a {
            color: white;
        }

        .columna {
            padding: 10px;
            text-align: center;
        }

        .main {
            margin-top: 50px;
            margin-bottom: 30px;
            padding: 20px 0;
        }

        .widgets {
            margin-top: 50px;
            margin-bottom: 30px;
            background: #276955;
            color: white;
        }

        .widgets>div {
            padding: 20px;
        }

        .encabezado {
            background: #41A58D;
            padding: 6px;
            border-radius: 2px;
            text-align: center;
        }

        .col1 {
            text-align: center;
        }

        form {
            padding: 15px;
        }

        form {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20px;
        }

        /* Estilos para mostrar las alertas de Bootstrap */
        .invalid-feedback {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }

        h3 {
            color: white;
        }
    </style>
</head>

<body id="main">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#container2" style="color: rgb(255, 255, 255);">
                    <strong id="Veterinaria">Veterinaria</strong> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item center-container">
                            <label class="switch" for="dark-mode-btn">
                                <input type="checkbox" id="dark-mode-btn" onchange="toggleDarkMode()">
                                <span class="slider"></span>
                                <i class="fas fa-sun"></i>
                                <i class="fas fa-moon"></i>
                            </label>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active " href="index.php" id="inicio">
                                <strong id="inicio">Inicio</strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Servicios.php" target="_blank" id="servicios">
                                <strong id="Servicios" style="color: #44e996;"> Servicios</strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Especialidades.html" target="_blank" id="especialidad">
                                <strong id="Especialidades">Especialidades</strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contacto.php" target="_blank" id="contacto">
                                <strong id="Contacto">Contacto</strong>
                            </a>
                        </li>
                        <!-- <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flag-icon flag-icon-es"></span>
                            
                          </button>
                          <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" onclick="cambiarIdioma('espanol')">
                              <span class="flag-icon flag-icon-es"></span>
                              Español
                            </a>
                            <a class="dropdown-item" onclick="cambiarIdioma('ingles')">
                              <span class="flag-icon flag-icon-gb"></span>
                              English
                            </a>
                          </div>
                        </div> -->


                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container container2">
            <div class=" row">
                <div class="col-12 mt-5">
                    <div class="encabezado mt-5">
                        <h3 class="mt-2 mb-2">Solicitud de Adopcion</h3>
                    </div>
                    <div class="col-12 ">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="formValidar" id="formValidar"
                            class="needs-validation" novalidate enctype="multipart/form-data">

                            <div class="card " id="a1">
                                <div class="card-header">
                                    <h5 class="card-title">Datos Personales</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="row justify-content-around">
                                        <div class="col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="a13">Nombre
                                                        </div>

                                                    </div>
                                                    <input type="text" class=" form-control" name="nombre"
                                                        placeholder="Nombre de usuario" required minlength="3" id="a2">
                                                    <div class="invalid-feedback">
                                                        Ingrese su nombre, debe tener como min 3 caracteres
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="a14">Número
                                                            de cedula</div>
                                                    </div>
                                                    <input type="number" min="1" class="form-control" name="cedula"
                                                        required placeholder="Cédula de usuario" id="a3">
                                                    <div class="invalid-feedback">
                                                        Ingrese el número de cédula, debe contener 10 dígitos
                                                        (Ecuatoriana)
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="a15">Correo
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="email" required
                                                        placeholder="espe@edu.ec" id="a4">
                                                    <div class="invalid-feedback">
                                                        Ingrese su correo electronico
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-xl-6">

                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="a16">Teléfono
                                                        </div>
                                                    </div>
                                                    <input type="number" min="1" class="form-control" name="telefono"
                                                        required placeholder="Teléfono de usuario" id="a5">
                                                    <div class="invalid-feedback">
                                                        Ingrese el número de telefonico, debe contener 10 dígitos
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="a17">
                                                            Dirección</div>
                                                    </div>
                                                    <input type="text" name="direccion" required class="form-control"
                                                        placeholder="Dirección de usuario del destinatario" id="a6">
                                                    <div class="invalid-feedback">
                                                        Ingrese su dirección debe tener como min 3 caracteres
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text " id="a18">
                                                            Ocupación</div>
                                                    </div>
                                                    <input type="text" name="ocupacion" class="form-control"
                                                        placeholder="Ocupación del usuario" id="a7">
                                                    <div class="invalid-feedback">
                                                        Ingrese su ocupación debe tener como min 3 caracteres
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    </p>
                                </div>
                            </div>

                            <div class="card mt-3" id="a8">
                                <div class="card-header ">
                                    <h5 class="card-title">Situación Familiar</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="row justify-content-around">
                                        <div class="col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="a19">Personas que vivan con
                                                            usted
                                                        </div>
                                                    </div>
                                                    <input type="number" min="1" class="form-control" name="numPersonas"
                                                        required id="a9">

                                                    <div class="invalid-feedback">
                                                        Ingrese el dato solicitado
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-xl-6">
                                            <div class="row">
                                                <div class="col1 col-sm-12 col-md-12 col-xl-6">
                                                    <label class="form-label">Tipo de
                                                        inmueble</label>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-xl-6" id="a10">
                                                    <select name="domicilio"
                                                        class="form-select custom-select custom-select-md" id="a20"
                                                        required>
                                                        <option selected disabled value="">Elija una opción</option>
                                                        <option>Casa propia</option>
                                                        <option>Departamento</option>
                                                        <option>Quinta</option>
                                                        <option>Finca</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Seleccione una opción
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>

                            <div class="card mt-3" id="a11">
                                <div class="card-header ">
                                    <h5 class="card-title">Preguntas Varias</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">

                                    <div class="form-group">
                                        ¿Por que desea adoptar?
                                        <textarea name="mensaje" cols="10" rows="3" class="form-control"
                                            id="a12"></textarea>
                                        <div class="invalid-feedback">
                                            Completar!
                                        </div>
                                    </div>
                                    </p>
                                </div>

                            </div>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">Cargar Archivo PDF</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="form-group">
                                        <label for="pdfFile">Subir Archivo PDF</label>
                                        <input type="file" class="form-control" id="pdfFile" name="pdfFile"
                                            accept=".pdf">
                                            <div class="invalid-feedback">
                                            Seleccione un archivo PDF para cargar
                                        </div>

                                    </div>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 text-center mt-3">
                                <div class="custom-control custom-checkbox ">

                                    <input type="checkbox" /> Acepto terminos y condiciones <br />
                                    <div class="invalid-feedback">
                                        Marque una opción
                                    </div>
                                </div>
                                <button class="btn btn-info mt-3" type="submit">Enviar formulario</button>
                                </p>
                            </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </main>

    <footer class="text-white py-3 mt-5 d-sm-none d-none d-lg-block">
        <!-- Primer footer -->
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <a class="nav-link" href="https://www.facebook.com/" target="_blank">
                    <i><img src="img/facebook.jpg" alt="" srcset=""></i><span id="facebook-text">Facebook</span>
                </a>
                <a class="nav-link" href="https://www.instagram.com/" target="_blank">
                    <i><img src="img/instagram.jpg" alt=""></i><span id="instagram-text">Instagram</span>
                </a>
                <a class="nav-link" href="https://web.whatsapp.com/" target="_blank">
                    <i><img src="img/whatsapp.jpg" alt=""></i><span id="whatsapp-text">Whatsapp Web</span>
                </a>
            </div>
            <div class="col-md-4 col-sm-12 text-center">
                <strong class="mb-3"><span id="vet-name">Veterinaria la Esperanza de tu mascota</span></strong>
                <img src="img/Proyecto nuevo.png" alt="" width="100px" class="mb-3">
            </div>
            <div class="col-md-4 col-sm-12 text-md-end align-items-end">
                <p><span id="ecuador-text">Ecuador</span></p>
                <p><span id="santo-domingo-text">Santo Domingo</span></p>
                <p><span id="phone-number">+(593) 975 999 999</span></p>
                <p><span id="neighborhood">Barrio: Luz de America</span></p>
                <p><span id="email">veterinaria@esperanza.com</span></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <p class="mb-0"><span id="rights-reserved-text">© 2023 Todos los derechos reservados</span></p>
                </div>
            </div>
        </div>
    </footer>
    <footer class="text-white py-3 mt-5 d-md-block d-none d-sm-none d-lg-none"> <!--Segundo footer-->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a class="nav-link" href="https://www.facebook.com/" target="_blank">
                        <i><img src="img/facebook.jpg" alt="" srcset=""></i> Facebook
                    </a>


                    <a class="nav-link" href="https://www.instagram.com/" target="_blank">
                        <i><img src="img/instagram.jpg" alt=""></i> Instagram
                    </a>
                    <a class="nav-link" href="https://web.whatsapp.com/" target="_blank">
                        <i><img src="img/whatsapp.jpg" alt=""></i> Whatsapp Web
                    </a>
                </div>
                <div class="col-12 text-center">
                    <strong class="mb-3 ">Veterinaria la Esperanza de tu mascota <br></strong>
                    <img src="img/Proyecto nuevo.png" alt="" width="100px" class="mb-3 mt-3">
                </div>
                <div class="col-12 text-center align-items-end">
                    <p>Ecuador</p>
                    <p>Santo Domingo</p>
                    <p>+(593) 975 999 999</p>
                    <p>Barrio: Luz de America</p>
                    <p>veterinaria@esperanza.com</p>
                    <hr style="background-color: aliceblue;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">© 2023 Todos los derechos reservados</p>
                </div>
            </div>
        </div>
    </footer>
    <footer class="text-white py-3 mt-5 d-md-none d-lg-none d-sm-block ">
        <div class="container ">
            <div class="row ">
                <div class="col-12">
                    <div class="footer-container">
                        <div class="social-links">
                            <a class="nav-link" href="https://www.facebook.com/">
                                <i><img src="img/facebook.jpg" alt="" srcset=""></i> Facebook
                            </a>
                            <a class="nav-link" href="https://www.instagram.com/">
                                <i><img src="img/instagram.jpg" alt=""></i> Instagram
                            </a>
                            <a class="nav-link" href="https://web.whatsapp.com/">
                                <i><img src="img/whatsapp.jpg" alt=""></i> Whatsapp Web
                            </a>
                        </div>
                        <div class="logo">
                            <strong>Veterinaria la Esperanza de tu mascota</strong>
                            <br>
                            <img src="img/Proyecto nuevo.png" alt="" width="100px" class="mb-3 mt-3">
                        </div>
                        <div class="contact-info">
                            <p>Ecuador</p>
                            <p>Santo Domingo</p>
                            <p>+(593) 975 999 999</p>
                            <p>Barrio: Luz de America</p>
                            <p>veterinaria@esperanza.com</p>
                            <div class="separator-line"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">© 2023 Todos los derechos reservados</p>
                </div>
            </div>
        </div>
    </footer>

</body>
<script src="JS/Formulario.js"></script>


</html>