<?php
/* Inicia validación del lado del servidor */
if (empty($_POST['note-has-title']) || empty($_POST['nombre-evento']) || empty($_POST['note-has-description']) || empty($_POST['equipos'])) {
    $errors[] = "Todos los campos son obligatorios.";
} else if (!empty($_POST['note-has-title'])) {
    /* Connect To Database */
    require_once("conexionDB.php"); // Contiene función que conecta a la base de datos

    // Escaping y formateo de datos
    $fecha_evento = mysqli_real_escape_string($link, strtoupper(strip_tags($_POST["note-has-title"], ENT_QUOTES))); // Título en mayúsculas
    $nombre_evento = mysqli_real_escape_string($link, strip_tags($_POST["nombre-evento"], ENT_QUOTES));
    $descripcion = mysqli_real_escape_string($link, strip_tags($_POST["note-has-description"], ENT_QUOTES));

    // Procesar equipos como una lista
    $equipos_input = mysqli_real_escape_string($link, strip_tags($_POST["equipos"], ENT_QUOTES));
    $equipos_array = explode("\n", $equipos_input); // Separar por saltos de línea
    $equipos_lista = "<ul>"; // Crear una lista HTML
    foreach ($equipos_array as $equipo) {
        $equipo = trim($equipo); // Eliminar espacios en blanco
        if (!empty($equipo)) {
            $equipos_lista .= "<li>" . htmlspecialchars($equipo) . "</li>"; // Agregar cada equipo como un elemento de lista
        }
    }
    $equipos_lista .= "</ul>";

    $date_added = date("Y-m-d H:i:s");

    // Insertar en la base de datos
    $sql = "INSERT INTO `notas` (`id`, `titulo`, `nombre_evento`, `descripcion`, `equipos`, `fecha`, `categoria`) 
            VALUES (NULL, '$fecha_evento', '$nombre_evento', '$descripcion', '$equipos_lista', '$date_added', 'social');";
    $query_new_insert = mysqli_query($link, $sql);

    if ($query_new_insert) {
        $messages[] = "Nota ha sido ingresada satisfactoriamente.";
    } else {
        $errors[] = "Lo siento, algo ha salido mal. Intenta nuevamente." . mysqli_error($link);
    }
} else {
    $errors[] = "Error desconocido.";
}

if (isset($errors)) {
    ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong>
        <?php
        foreach ($errors as $error) {
            echo $error;
        }
        ?>
    </div>
    <?php
}


if (!preg_match('/^\d{2}[A-Z]{3}-\d{4}$/', $fecha_evento)) {
	$errors[] = "El formato de la fecha debe ser DDMMM-AAAA (Ej: 19FEB-2025).";
}



if (isset($messages)) {
    ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Bien hecho!</strong>
        <?php
        foreach ($messages as $message) {
            echo $message;
        }
        ?>
    </div>
    <?php
}
?>
