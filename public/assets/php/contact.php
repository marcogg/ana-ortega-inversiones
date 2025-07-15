<?php
header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => 'Un error desconocido ocurrió.'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clave secreta de ReCaptcha (obténla de tu consola de Google reCAPTCHA)
    define('RECAPTCHA_SECRET_KEY', '6Lde438rAAAAACs2G2bzMXdMuzVJ8D_ASqgKO-xl');

    // Validar campos del formulario
    $name = filter_var(trim($_POST['name'] ?? ''), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST['phone'] ?? ''), FILTER_SANITIZE_STRING); // Sanitizar como string, luego validar
    $message = filter_var(trim($_POST['message'] ?? ''), FILTER_SANITIZE_STRING);
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

    // Validaciones básicas
    if (empty($name)) {
        $response['message'] = 'El nombre es requerido.';
        echo json_encode($response);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Por favor, ingresa un correo electrónico válido.';
        echo json_encode($response);
        exit;
    }
    if (!empty($phone) && !preg_match('/^\d{7,15}$/', $phone)) { // Valida si el teléfono no está vacío y si cumple el formato
        $response['message'] = 'Por favor, ingresa un número de teléfono válido (solo dígitos).';
        echo json_encode($response);
        exit;
    }
    // if (empty($message)) {
    //     $response['message'] = 'El mensaje es requerido.';
    //     echo json_encode($response);
    //     exit;
    // }

    // Validar ReCaptcha
    if (empty($recaptchaResponse)) {
        $response['message'] = 'Por favor, verifica que no eres un robot.';
        echo json_encode($response);
        exit;
    }

    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaData = [
        'secret' => RECAPTCHA_SECRET_KEY,
        'response' => $recaptchaResponse
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($recaptchaData),
        ],
    ];

    $context  = stream_context_create($options);
    $verifyResult = file_get_contents($verifyUrl, false, $context);
    $decodedResult = json_decode($verifyResult);

    if (!$decodedResult || !$decodedResult->success) {
        $response['message'] = 'Falló la verificación de ReCaptcha. Por favor, inténtalo de nuevo.';
        $response['debug'] = $verifyResult; // Add this line for debugging
        // Opcional: 
        // $decodedResult->{'error-codes'}
        echo json_encode($response);
        exit;
    }

    // Si todo es válido, procede a enviar el correo
    $to = 'marcogarcia.gon@gmail.com'; // **CAMBIA ESTO A TU CORREO**
    $subject = 'Mensaje de Contacto desde tu Landing Page Inmobiliaria';
    $email_content = "Nombre: $name\n";
    $email_content .= "Email: $email\n";
    if (!empty($phone)) {
        $email_content .= "Teléfono: $phone\n";
    }
    $email_content .= "Mensaje:\n$message\n";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $headers)) {
        $response['success'] = true;
        // $response['message'] = 'Mensaje enviado con éxito.';
        header('Location: ../gracias-por-contactarnos.html');
        exit;
    } else {
        $response['message'] = 'Error al enviar el correo electrónico. Por favor, inténtalo de nuevo más tarde.';
    }

} else {
    $response['message'] = 'Método de solicitud no válido.';
}

echo json_encode($response);
?>