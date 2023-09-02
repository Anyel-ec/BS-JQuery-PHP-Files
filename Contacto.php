<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'nombre' => $_POST['nombre'],
        'correo' => $_POST['correo'],
        'telefono' => $_POST['telefono'],
        'mensaje' => $_POST['mensaje'],
    ];

    $filePathTxt = 'contacto.txt';

    $textData = "Nombre: " . $data['nombre'] . "\n";
    $textData .= "Correo Electrónico: " . $data['correo'] . "\n";
    $textData .= "Teléfono: " . $data['telefono'] . "\n";
    $textData .= "Mensaje: " . $data['mensaje'] . "\n";
    $textData .= "****************************************" . "\n";

    // Guardar los datos en el archivo de texto
    if (file_put_contents($filePathTxt, $textData, FILE_APPEND | LOCK_EX) !== false) {
        echo "Los datos se han guardado correctamente en un archivo de texto.";
    } else {
        echo "Error al guardar los datos en el archivo de texto.";
    }

    
    $filePathCsv = 'contacto.csv';

    $csvData = $data['nombre'] . "," . $data['correo'] . "," . $data['telefono'] . "," . $data['mensaje'] . "\n";

    // Guardar los datos en el archivo CSV
    if (file_put_contents($filePathCsv, $csvData, FILE_APPEND | LOCK_EX) !== false) {
        echo "Los datos se han guardado correctamente en un archivo CSV (Excel).";
    } else {
        echo "Error al guardar los datos en el archivo CSV (Excel).";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">

    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
     
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
            cursor: all-scroll;
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

        h2 {
            color: #276955;
        }

        .colum {
            color: #276955;
        }

        h4,
        h5 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        img {
            border-radius: 10%;
        }

        .hover-top {
            cursor: pointer;
        }

        .abrir-cerrar {
            cursor: pointer;
        }

        .form-container {
            background-color: #276955;
            padding: 3em 6em;
        }

        label {
            color: white;
        }

        .redon {
            border-radius: 10px;
        }
        .invalid-feedback{
            color: white;
        }
    </style>
</head>

<body id="body">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#container2" style="color: rgb(255, 255, 255);"> 
                  <strong id="Veterinaria">Veterinaria</strong> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <a class="nav-link active " href="index.html" id="inicio" >
                              <strong id="inicio" >Inicio</strong>
                              </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Servicios.html" target="_blank" id="servicios">
                              <strong id="Servicios"> Servicios</strong>
                              </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Especialidades.html" target="_blank" id="especialidad">
                              <strong id="Especialidades">Especialidades</strong>
                              </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacto.html" target="_blank" id="contacto">
                              <strong id="Contacto" style="color: #44e996;">Contacto</strong>
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
    <div class="container">
        <br><br><br><br><br>
        <h2>Conoce más de nuestros doctores</h2>
        <section class="row widgets justify-content-between redon">
            <?php
            $doctors = [
                [
                    "image" => "img/Stefy.jpg",
                    "name" => "Stefany",
                    "title" => "Traumatóloga",
                    "description" => "Con 7 años de experiencia en el diagnóstico preciso y tratamiento de diversas afecciones musculoesqueléticas. Ofrece una atención integral a los animales que han sufrido lesiones traumáticas."
                ],
                
                [
                    "image" => "img/Liss.jpg",
                    "name" => "Liss",
                    "title" => "Fisioterapeuta",
                    "description" => "Nuestra profesional se ha dedicado más de 5 años a proporcionar una atención excepcional
                    y terapia de vanguardia para mejorar la calidad de vida y promover la recuperación de
                    nuestras queridas mascotas"
                ],

                [
                    "image" => "img/Marii.jpg",
                    "name" => "Marii",
                    "title" => "Cardióloga",
                    "description" => "Con 8 años de experiencia y conocimientos avanzados, brinda diagnóstico preciso, tratamiento
                    especializado y cuidado compasivo para problemas cardíacos en animales, asegurando su bienestar
                    cardiovascular"
                ],

                [
                    "image" => "img/Angel.jpg",
                    "name" => "Ángel",
                    "title" => "Oncólogo",
                    "description" => "Con 10 años de experiencia en diagnóstico temprano del cáncer, opciones de tratamiento avanzadas
                    y cuidados paliativos, trabaja incansablemente para mejorar la calidad de vida de los animales
                    afectados por esta enfermedad."
                ]
            ];

            foreach ($doctors as $doctor) {
                echo '<div class="col-12 col-md-4 col-lg-3 text-align-center">';
                echo '<h4 class="mb-4 text-color"><b>' . $doctor["title"] . '</b></h4>';
                echo '<div class="text-center agrandar">';
                echo '<img src="' . $doctor["image"] . '" alt="" width="200px" height="250px"> <br><br>';
                echo '</div>';
                echo '<div class="hover-top">';
                echo '<h5 class="mb-4"><b>' . $doctor["name"] . '</b></h5>';
                echo '<p>' . $doctor["description"] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </section>

        
        <section class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="row justify-content-center text-center agrandar">
                        <img src="img/gatitos.jpg" class="mr-2" alt="" width="320px" height="120px">
                        <img src="img/perritos.jpg" class="ml-2" alt="" width="320px" height="120px"> <br><br>
                    </div>
                    <div class="row justify-content-center mb-5 mt-5">
       
                        <h2 class="abrir-cerrar btn btn-lg btn-block agrandar btn-outline-success mb-3">Contacto</h2>
                        <div class="col-md-12 col-md form-container redon">
                            <center>
                                <h3 class="text-white p-4">Envíanos un mensaje</h3>
                            </center>
                            
                            <form action="" id="formulario" method="post">
                                <div class="form-group">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" id="a1" class="form-control mt-1" placeholder="Nombre" name="nombre"
                                        id="nombre">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="Correo" >Correo Electrónico</label>
                                    <input type="email" id="a2" class="form-control mt-1" placeholder="Correo" name="correo"
                                        id="correo">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="text" >Número</label>
                                    <input type="text" id="a3" class="form-control mt-1" maxlength="10" placeholder="Ejemplo: 099231919"
                                        name="telefono" id="telefono">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="Mensaje" >Mensaje</label>
                                    <textarea class="form-control mt-1" id="a4"name="mensaje" id="mensaje"></textarea>
                                </div>
                                <center><input type="submit" value="Enviar"
                                        class="btn btn-lg btn-outline-light mt-5 mb-5"></center>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="row justify-content-center">
                <div class="colum col-12 col-md-6">
                    <div class="hover-top"><a><img src="img/direccion.jpg" alt="" width="40px"> Vía Santo Domingo - Via
                            Quevedo Km. 24 Hda.
                            Zoila Luz Avenida Quevedo 3-703-914, Santo Domingo 230153</a><br><br></div>
                    <div class="hover-top"><a><img src="img/horario.jpg" alt="" width="40px"> Lunes-Viernes
                            7:00-15:30</a><br><br></div>
                    <div class="hover-top"><a><img src="img/correo.jpg" alt="" width="40px">
                            veterinaria@ESPEranza</a><br><br></div>
                    <div class="hover-top"><a><img src="img/telefono.jpg" alt="" width="40px"> (02) 272-2246</a><br><br>
                    </div>
                    <div class="hover-top"><a><img src="img/what.jpg" alt="" width="40px"> 0999999999</a><br><br></div>
                </div>

                <div class="row justify-content-start">
                    <div class="col-12 col-md-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.859259761703!2d-79.3094716!3d-0.4127086!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d53237044f39bb%3A0x24ed753bfe34c98b!2sUniversidad%20de%20las%20Fuerzas%20Armadas%20-%20ESPE%20-%20Santo%20Domingo!5e0!3m2!1ses!2sec!4v1685996518441!5m2!1ses!2sec"
                            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <br><br>
            </section>

    </div>
</main>
<footer class="text-white py-3 mt-5 d-sm-none d-none d-lg-block">
        
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
  <footer class="text-white py-3 mt-5 d-md-none d-lg-none d-sm-block " >
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
   

    $(document).ready(function () {
            $(".agrandar").hover(
                function () {
                    $(this).css("transform", "scale(1.1)");
                    $(this).css("transition", "transform 0.3s");
                },
                function () {
                    $(this).css("transform", "scale(1.0)");
                    $(this).css("transition", "transform 0.3s");
                }
            );
        });

        $(document).ready(function () {
            $(".hover-top").hover(
                function () {
                    $(this).stop().animate({ marginLeft: "-6px" }, 300);
                },
                function () {
                    $(this).stop().animate({ marginLeft: "0" }, 300);
                }
            );
        });

        $(document).ready(function () {
            $("#formulario").slideToggle();
        })

        $(document).ready(function () {
            $(".abrir-cerrar").click(function () {
                $("#formulario").slideToggle(300);
                $(this).toggleClass(".abrir-cerrar");
            })
        })

        $.validator.addMethod("letras", function (value, element) {
            var pattern = /^[A-Za-z]+$/;
            return pattern.test(value);
        }, "Por favor, ingrese solo letras.");

        $.validator.addMethod("numerico", function (value, element) {
            var pattern = /^[0-9]+$/;
            return pattern.test(value);
        }, "Por favor, ingrese solo números.");

        $(document).ready(function () {
            $("#formulario").validate({
                rules: {
                    nombre: {
                        required: true,
                        letras: true,
                    },
                    correo: {
                        required: true,
                        email: true,
                    },
                    telefono: {
                        required: true,
                        numerico: true,
                    },
                    mensaje: {
                        required: true,
                    },
                },
                messages: {
                    nombre: {
                        required: "Este es un campo obligatorio.",
                        letras: "Por favor, ingrese solo letras.",
                    },
                    correo: {
                        required: "Este es un campo obligatorio.",
                        email: "Debe ingresar un correo electrónico válido",
                    },
                    telefono: {
                        required: "Este es un campo obligatorio.",
                        numerico: "Por favor, ingrese solo números.",
                    },
                    mensaje: {
                        required: "Este es un campo obligatorio.",
                    },
                },
                errorElement: "div",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function (element, errorClass) {
                    $(element).addClass(errorClass).removeClass("valid");
                },
                unhighlight: function (element, errorClass) {
                    $(element).removeClass(errorClass).addClass("valid");
                }
            });
        });
</script>
<script src="JS/contacto.js"></script>
</body>
</html>