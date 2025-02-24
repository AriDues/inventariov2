<?php
require_once("conexionDB.php");

if (isset($_GET['id'])) {
    $id_nota = intval($_GET['id']);
    $sql = "SELECT * FROM notas WHERE id = '$id_nota'";
    $query = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fecha_evento = mysqli_real_escape_string($link, strtoupper(strip_tags($_POST['titulo'], ENT_QUOTES)));
            $nombre_evento = mysqli_real_escape_string($link, strip_tags($_POST['nombre-evento'], ENT_QUOTES));
            $descripcion = mysqli_real_escape_string($link, strip_tags($_POST['descripcion'], ENT_QUOTES));

            // Procesar equipos como una lista
            $equipos_input = mysqli_real_escape_string($link, strip_tags($_POST['equipos'], ENT_QUOTES));
            $equipos_array = explode("\n", $equipos_input); // Separar por saltos de línea
            $equipos_lista = "<ul>"; // Crear una lista HTML
            foreach ($equipos_array as $equipo) {
                $equipo = trim($equipo); // Eliminar espacios en blanco
                if (!empty($equipo)) {
                    $equipos_lista .= "<li>" . htmlspecialchars($equipo) . "</li>"; // Agregar cada equipo como un elemento de lista
                }
            }
            $equipos_lista .= "</ul>";

            $update_sql = "UPDATE notas SET titulo = '$fecha_evento', nombre_evento = '$nombre_evento', descripcion = '$descripcion', equipos = '$equipos_lista' WHERE id = '$id_nota'";
            $update_query = mysqli_query($link, $update_sql);

            if ($update_query) {
                header("Location: index.html");
                exit();
            } else {
                echo "Error al actualizar la nota: " . mysqli_error($link);
            }
        }

        // Convertir la lista de equipos de vuelta a texto plano para edición
        $equipos_edicion = str_replace(["<ul>", "</ul>", "<li>", "</li>"], "", $row['equipos']);
        $equipos_edicion = trim($equipos_edicion);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Editar Nota</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container mt-5">
                <h2>Editar Nota</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="titulo">Fecha del evento (Formato: DDMMM-AAAA)</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($row['titulo']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre-evento">Nombre del evento</label>
                        <input type="text" class="form-control" id="nombre-evento" name="nombre-evento" value="<?= htmlspecialchars($row['nombre_evento']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción del evento</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= htmlspecialchars($row['descripcion']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="equipos">Equipos a utilizar (uno por línea)</label>
                        <textarea class="form-control" id="equipos" name="equipos" rows="5" required><?= htmlspecialchars($equipos_edicion); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="index.html" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Nota no encontrada.";
    }
} else {
    echo "ID de nota no proporcionado.";
}
?>