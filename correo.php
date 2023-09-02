<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Contacto con reCAPTCHA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Formulario de Contacto</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recaptcha_secret_key = '6LeyktonAAAAAIESrP7cCZ6-ZmZovcQktqMqJJLY'; // Tu clave secreta de reCAPTCHA

        $recaptcha_response = $_POST['g-recaptcha-response'];
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_data = [
            'secret' => $recaptcha_secret_key,
            'response' => $recaptcha_response,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];
        $recaptcha_options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($recaptcha_data)
            ]
        ];
        $recaptcha_context = stream_context_create($recaptcha_options);
        $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
        $recaptcha_response_data = json_decode($recaptcha_result);

        if ($recaptcha_response_data->success) {
            // Cargar el contenido del archivo correo.html
            $contenido_correo = file_get_contents('correo.html');
        
            // Personalizar el contenido con los datos del formulario
            $nombre = $_POST["nombre"];
            $correo = $_POST["correo"];
            $mensaje = $_POST["mensaje"];
        
            // Reemplazar las etiquetas de marcador de posición con los datos reales
            $contenido_correo = str_replace('{{NOMBRE}}', $nombre, $contenido_correo);
            $contenido_correo = str_replace('{{CORREO}}', $correo, $contenido_correo);
            $contenido_correo = str_replace('{{MENSAJE}}', $mensaje, $contenido_correo);
        
            // Configurar encabezados y enviar el correo, AGREGA EL CORREO
            $destinatario = "CORREO";
            $asunto = "Sitio Web";
            $cabeceras = "From: $correo" . "\r\n" .
                "Reply-To: $correo" . "\r\n" .
                "Content-type: text/html; charset=UTF-8" . "\r\n" .
                "X-Mailer: PHP/" . phpversion();
        
            // Envía el correo con el contenido personalizado
            if (mail($destinatario, $asunto, $contenido_correo, $cabeceras)) {
                $mensaje_respuesta = "Mensaje enviado con éxito.";
            } else {
                $mensaje_respuesta = "Hubo un problema al enviar el mensaje.";
            }
        } else {
            echo '<div class="alert alert-danger">Por favor, completa el reCAPTCHA.</div>';
        }        
    }
    ?>

    <?php if (isset($mensaje_respuesta)) { ?>
        <div class="alert <?php echo $mensaje_respuesta === "Mensaje enviado con éxito." ? "alert-success" : "alert-danger"; ?>">
            <?php echo $mensaje_respuesta; ?>
        </div>
    <?php } ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
        </div>
        
        <!-- Agrega el reCAPTCHA aquí -->
        <div class="g-recaptcha" data-sitekey="6LeyktonAAAAACkVlUlTVyDOykoyw8YPG9MhH79T"></div>
        <br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
