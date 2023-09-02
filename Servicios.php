<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreArchivo = "datos.txt"; // Nombre del archivo donde se guardarán los datos

    // Recopilar los datos del formulario
    $cita = $_POST["cita"];
    $fechaHora = $_POST["fechaHora"];
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

    // Crear una cadena con los datos
    $datos = "Cita: $cita\n
    Fecha: $fechaHora\n
    Nombre: $nombre\n
    Cédula: $cedula\n
    Correo: $email\n
    Teléfono: $telefono\n
    Dirección: $direccion\n
    Nombre de Mascota: $nomMascota\n
    Edad de Mascota: $edad\n
    Raza: $raza\n
    Color: $color\n
    Sexo: $sexo\n
    Síntomas: $sintomas\n\n";

    // Guardar los datos en el archivo
    file_put_contents($nombreArchivo, $datos, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="JS/jQuery v3.7.0.js"></script>
    <script src="JS/jQuery Easing v1.3.js"></script>
    <!--Libreria-->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

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
            background: white;
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

        .reset {
            all: revert;
        }

        .encabezado {
            background: #41A58D;
            padding: 6px;
            border-radius: 2px;
            text-align: center;
        }

        h3,
        h4 {
            color: white;
        }

        /* CSS for Hover Animation */
        #a5 {
            /* Set initial properties for animation */
            transition: transform 0.3s ease;
        }

        #a5:hover {
            /* Apply the transformation when hovering over the element */
            transform: scale(1.1);
            /* You can adjust the scaling factor as desired */
        }

        /* CSS for Hover Animation */
        #a7 {
            /* Set initial properties for animation */
            transition: transform 0.3s ease;
        }

        #a7:hover {
            /* Apply the transformation when hovering over the element */
            transform: scale(1.1);
            /* You can adjust the scaling factor as desired */
        }
    </style>

    <script>
        $(document).ready(function () {

            // Variables para las imágenes
            var imagenOriginal = "img/Adopcion-mascotas.jpg"; // Ruta de la imagen original
            var nuevaImagen = "img/Adopcion2.jpg"; // Ruta de la nueva imagen

            // Función para cambiar la imagen con efecto de transición
            function cambiarImagenConEfecto() {
                var imagenActual = $("#imagen-mascota");
                imagenActual.fadeOut(500, function () {
                    var nuevaSrc = (imagenActual.attr("src") === imagenOriginal) ? nuevaImagen : imagenOriginal;
                    imagenActual.attr("src", nuevaSrc);
                    imagenActual.fadeIn(500);
                });
            }

            // Llama a la función cambiarImagenConEfecto cada 3 segundos
            setInterval(cambiarImagenConEfecto, 3000); // 3000 milisegundos = 3 segundos
            //--------------------------------------------- Seccion validaciones - Formulario

            // Ocultar el formulario al cargar la página
            $('#formulario').hide();
            // Evento de cambio en el radio de opciones de consulta
            $('input[name="cita"]').change(function () {
                var selectedOption = $(this).attr('id');

                if (selectedOption === 'radioPersonalizado3' || selectedOption === 'radioPersonalizado4') {
                    // Mostrar el formulario si se selecciona una de las opciones de consulta
                    $('#formulario').show();
                } else {
                    // Ocultar el formulario si no se selecciona ninguna opción de consulta
                    $('#formulario').hide();
                }
            });

            $('#formValidar').validate({

                errorElement: 'div',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                rules: {
                    nombre: {
                        required: true,
                    },
                    cedula: {
                        required: true,
                        digits: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    telefono: {
                        required: true,
                        digits: true,
                    },
                    direccion: {
                        required: {
                            depends: function (element) {
                                return $('#radioPersonalizado3').is(':not(:checked)');
                            }
                        },
                    },
                    nomMascota: {
                        required: true,
                    },
                    edad: {
                        required: true,
                        digits: true,
                    },
                    raza: {
                        required: true,
                    },
                    color: {
                        required: true,
                    },
                    sexo: {
                        required: true,
                    },
                    // Resto de los campos del formulario...
                },
                messages: {
                    nombre: {
                        required: 'Por favor, ingresa tu nombre.',
                    },
                    cedula: {
                        required: 'Por favor, ingresa tu número de cédula.',
                        digits: 'Por favor, ingresa solo dígitos.',
                    },
                    email: {
                        required: 'Por favor, ingresa tu correo electrónico.',
                        email: 'Por favor, ingresa un correo electrónico válido.',
                    },
                    telefono: {
                        required: 'Por favor, ingresa tu número de teléfono.',
                        digits: 'Por favor, ingresa solo dígitos.',
                    },
                    direccion: {
                        required: 'Por favor, ingresa tu dirección.',
                    },
                    nomMascota: {
                        required: 'Por favor, ingresa el nombre de tu mascota.',
                    },
                    edad: 'Por favor, ingresa la edad de tu mascota',
                    color: 'Por favor, ingresa el color de tu mascota',
                    sinto: 'Por favor, ingresa los sintomas de tu mascota',
                    raza: 'Por favor, ingresa la raza de tu mascota',
                    sexo: ''
                    // Resto de los campos del formulario...
                },
                submitHandler: function (form) {
                    // Aquí puedes agregar el código para enviar el formulario si todas las validaciones son exitosas
                    form.submit();
                }
            });

            $('#radioPersonalizado3').change(function () {
                var direccionInput = $('input[name="direccion"]');
                if ($(this).is(':checked')) {
                    direccionInput.prop('readonly', true);
                    direccionInput.val('');
                } else {
                    direccionInput.prop('readonly', false);
                }
            });
            $('#radioPersonalizado4').change(function () {
                var direccionInput = $('input[name="direccion"]');
                if ($(this).is(':checked')) {

                    direccionInput.prop('readonly', false);
                }
            });
        });
    </script>


</head>

<body id="a8">
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
                            <a class="nav-link " href="index.php" id="inicio">
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
    <main id="main">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="colum mt-5 ">
                        <div class="encabezado mt-5 ">
                            <h3 class="mt-2 mb-2">Adopción</h3>
                        </div>
                        <div class="row mt-3 mt-4 ">
                            <div class="col-md-5 col-lg-5 col-sm-12 ">
                                <div class="card" style="max-width: 540px;" id="a13">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <img id="imagen-mascota" src="img/Adopcion-mascotas.jpg"
                                                class="img-fluid card-img-top" alt="adopcion" style="width:200%">
                                        </div>
                                        <div class="col-md-12" id="a1">
                                            <div class="card-body ">
                                                <br>
                                                <p class="card-text">Este trámite está designado para todas aquellas
                                                    personas que requieran una mascota de compañía, ya sean rescatados,
                                                    abandonados y/o dejados al cuidado del albergue canino municipal y
                                                    sus técnicos. El usuario debe visitar el albergue y escoger la
                                                    mascota, el técnico verifica el lugar de destino del adoptado,
                                                    posteriormente llenar un acta de adopción.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 col-sm-12">
                                <div class="card ml-2" id="a5">
                                    <div class="card-header text-center">
                                        <h5 class="card-title">¿Qué necesito para hacer el trámite?</h5>
                                    </div>
                                    <div class="card-body" id="a2">
                                        <p class="card-text">Este trámite esta designado para todas aquellas personas
                                            que requieran una mascota de compañía, ya sean rescatados, abandonados y/o
                                            dejados al cuidado del albergue canino municipal y sus técnicos .
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item" id="a3">1. Copia de cédula</li>
                                            <li class="list-group-item" id="a4">2. Llenar formulario de adopción</li>
                                        </ol>
                                        </p>
                                    </div>
                                </div>


                                <div class="card mt-3 ml-2" id="a7">
                                    <div class="card-header text-center" id="a6">
                                        <h5 class="card-title">¿Cómo hago el trámite?</h5>
                                    </div>
                                    <div class="card-body ">
                                        <p class="card-text">
                                        <ol>
                                            <li>Comunicarse con nosotros y dejanos conocer
                                                la mascota que desee adoptar o a través del sitio web,</li>
                                            <li>Coordinar con el técnico a cargo la mascota idónea para el solicitante,
                                            </li>
                                            <li>Inspección de verificación del técnico a la vivienda del adoptante,</li>
                                            <li>Llenar el formulario de adopción.</li>
                                        </ol>
                                        </p>
                                        <p class="text-center"><a href="FormularioServicios.php"
                                                class="btn btn-info ">Llenar Solicitud</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 ">
                                <form name="formValidar" id="formValidar"
                                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                    <div class="col-12 mt-3" id="a9">
                                        <div class="card text-dark bg-white mb-3 text-center">
                                            <div class="card-header encabezado">
                                                <h4 class="card-title mt-2">Separa tu cita medica</h5>
                                            </div>
                                            <div class="card-body" id="a10">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="cita" id="radioPersonalizado3"
                                                                class="custom-control-input" required>
                                                            <label for="radioPersonalizado3"
                                                                class="custom-control-label" value="Clinica">Consulta
                                                                en la clínica </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="cita" id="radioPersonalizado4"
                                                                class="custom-control-input" required>
                                                            <label for="radioPersonalizado4"
                                                                class="custom-control-label" value="Domicilio">Consulta
                                                                a
                                                                domicilio</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="formulario" style="display: none;">
                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                            <div class="card" id="a11">
                                                <div class="card-header text-center">
                                                    <h5 class="card-title">Datos Personales</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span id="a36" class="input-group-text"
                                                                for="validationCustom12">Fecha y Hora de Turno</span>
                                                        </div>
                                                        <input type="datetime-local" class="form-control"
                                                            name="fechaHora" id="validationCustom12" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text" for="validationCustom01"
                                                                id="a14">
                                                                Nombre</div>
                                                        </div>
                                                        <input id="a15" type="text" name="nombre" class="form-control"
                                                            placeholder="Nombre de usuario" id="validationCustom01"
                                                            required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div id="a16" class="input-group-text"
                                                                for="validationCustom02">
                                                                Número de cedula</div>
                                                        </div>
                                                        <input id="a17" type="number" min="1" name="cedula"
                                                            class="form-control" placeholder="Cedula de usuario"
                                                            id="validationCustom02" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span id="a18" class="input-group-text" id="basic-addon2"
                                                                for="validationCustom03">Correo</span>
                                                        </div>
                                                        <input id="a19" type="text" class="form-control" name="email"
                                                            placeholder="espe@edu.ec" aria-label="Correo"
                                                            aria-describedby="basic-addon2" id="validationCustom03"
                                                            required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span id="a20" class="input-group-text" id="basic-addon1"
                                                                for="validationCustom04">Teléfono</span>
                                                        </div>
                                                        <input id="a21" type="number" min="1" class="form-control"
                                                            placeholder="Teléfono de usuario"
                                                            aria-label="Teléfono de usuario"
                                                            aria-describedby="basic-addon1" name="telefono" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span id="a22" class="input-group-text" id="basic-addon2"
                                                                for="validationCustom05">Dirección</span>
                                                        </div>
                                                        <input id="a23" type="text" class="form-control"
                                                            placeholder="Dirección de usuario del destinatario"
                                                            aria-label="Dirección de usuario del destinatario"
                                                            aria-describedby="basic-addon2" name="direccion" required>
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Segundo formulario-->
                                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                                            <div class="card" id="a12">
                                                <div class="card-header text-center">
                                                    <h5 class="card-title">Datos de la mascota</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div id="a27" class="input-group-text"
                                                                for="validationCustom06">
                                                                Nombre</div>
                                                        </div>
                                                        <input id="a24" type="text" name="nomMascota"
                                                            class="form-control" placeholder="Nombre de mascota"
                                                            id="validationCustom06" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-ms-12 ">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span id="a25" class="input-group-text"
                                                                        id="basic-addon1"
                                                                        for="validationCustom07">Edad</span>
                                                                </div>
                                                                <input id="a26" type="number" min="1"
                                                                    class="form-control" name="edad"
                                                                    placeholder="Edad de la mascota"
                                                                    aria-label="Edad de la mascota"
                                                                    aria-describedby="basic-addon1"
                                                                    id="validationCustom07" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-ms-12">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span id="a32" class="input-group-text"
                                                                        id="basic-addon1"
                                                                        for="validationCustom08">Raza</span>
                                                                </div>
                                                                <input id="a28" type="text" class="form-control"
                                                                    name="raza" placeholder="Raza de la mascota"
                                                                    aria-label="Raza de la mascota"
                                                                    aria-describedby="basic-addon1"
                                                                    id="validationCustom08" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-ms-12">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span id="a29" class="input-group-text"
                                                                        id="basic-addon1"
                                                                        for="validationCustom09">Color</span>
                                                                </div>
                                                                <input id="a30" type="text" class="form-control"
                                                                    name="color" placeholder="Color de la mascota"
                                                                    aria-label="Color de la mascota"
                                                                    aria-describedby="basic-addon1"
                                                                    id="validationCustom09" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-ms-12">

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <label id="a31" class="input-group-text "
                                                                        for="validationCustom10">Sexo</label>
                                                                </div>
                                                                <select id="a33" name="sexo" class="custom-select  "
                                                                    id="validationCustom10" required>
                                                                    <option selected disabled>Elija una opción</option>
                                                                    <option value="Macho">Macho</option>
                                                                    <option value="Hembra">Hembra</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span id="a34" class="input-group-text"
                                                                for="validationCustom11">Síntomas</span>
                                                        </div>
                                                        <textarea class="form-control" aria-label="With textarea"
                                                            id="a35" name="sinto" id="validationCustom10"
                                                            required></textarea>
                                                    </div>
                                                    </p>
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="col-12 text-center mt-3">
                                                <div class="custom-control custom-checkbox ">
                                                    <input type="checkbox" name="terminos" id="checkboxPersonalizado1"
                                                        required class="custom-control-input">
                                                    <label for="checkboxPersonalizado1"
                                                        class="custom-control-label">Acepto
                                                        terminos y
                                                        condiciones</label>
                                                </div>
                                                <button class="btn btn-info mt-3" type="submit"
                                                    href="Servicios.html">Enviar
                                                    formulario</button></p>
                                            </div>
                                        </div>
                                        <!-- Agrega una sección para mostrar la tabla -->
                            <div class="col-12 mt-3">
                                <h5>Datos ingresados</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Cita</th>
                                            <th>Fecha y Hora de Turno</th>
                                            <th>Nombre</th>
                                            <th>Nombre de mascota</th>
                                            <th>Raza</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            // Obtener los datos del formulario
                                            $cita = $_POST["cita"];
                                            $fechaHora = $_POST["fechaHora"];
                                            $nombre = $_POST["nombre"];
                                            $nomMascota = $_POST["nomMascota"];
                                            $raza = $_POST["raza"];

                                            // Imprimir los datos en la tabla
                                            echo "<tr>
                                            <td>$cita</td>
                                            <td>$fechaHora</td>
                                            <td>$nombre</td>
                                            <td>$nomMascota</td>
                                            <td>$raza</td>
                                           </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                                    </div>

                                </form>
                            </div>

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
<script src="JS/servicios.js"></script>

</html>