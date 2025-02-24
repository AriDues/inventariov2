<?php
require_once("conexionDB.php");

if (isset($_GET['id'])) {
    $id_nota = intval($_GET['id']);
    $sql = "SELECT * FROM notas WHERE id = '$id_nota'";
    $query = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Imprimir Nota</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    flex-direction: column;
                    min-height: 100vh; /* Ocupa toda la altura de la ventana */
                    background: linear-gradient(90deg, rgba(0, 0, 0, 0.1) 1px, transparent 1px),
                                linear-gradient(rgba(0, 0, 0, 0.1) 1px, transparent 1px);
                    background-size: 20px 20px; /* Tamaño de la cuadrícula */
                }
                .note {
                    border: 1px solid #ccc;
                    padding: 20px;
                    margin: 20px;
                    flex: 1; /* Hace que el contenido principal ocupe el espacio disponible */
                    background-color: white; /* Fondo blanco para el contenido */
                }
                .note-title {
                    font-size: 24px;
                    font-weight: bold;
                    margin-bottom: 10px;
                    text-align: center;
                }
                .note-date {
                    font-size: 14px;
                    color: #666;
                    margin-bottom: 20px;
                    text-align: center;
                }
                .note-content {
                    font-size: 16px;
                    margin-top: 10px;
                    text-align: justify; /* Justificar el texto */
                }
                .note-content ul {
                    list-style-type: none;
                    padding: 0;
                }
                .note-content ul li {
                    margin-bottom: 5px;
                }
                .signatures {
                    display: flex;
                    justify-content: space-between;
                    padding: 20px;
                    margin-top: auto; /* Mueve las firmas al final de la página */
                    background-color: white; /* Fondo blanco para las firmas */
                }
                .signature {
                    text-align: center;
                    width: 45%; /* Ajusta el ancho de las firmas */
                }
                .signature-line {
                    border-bottom: 1px solid #000;
                    width: 100%;
                    margin-bottom: 10px;
                }
                .signature-label {
                    font-size: 14px;
                    color: #666;
                }
                .small-line {
                    border-bottom: 1px solid #000;
                    width: 100%;
                    margin-top: 10px; /* Espacio entre las firmas y la línea */
                }
                /* Espacio entre las firmas */
                .signature:first-child {
                    margin-right: 20px; /* Añade espacio a la derecha de la firma del técnico */
                }
                @media print {
                    body {
                        margin: 0;
                        padding: 0;
                    }
                    .note {
                        border: none;
                        padding: 0;
                        margin: 0;
                    }
                    .signatures {
                        margin-top: auto; /* Asegura que las firmas estén al final al imprimir */
                    }
                }
            </style>
        </head>
        <body>
            <div class="note">
                <div class="note-title"><?= htmlspecialchars($row['titulo']); ?></div>
                <div class="note-date"><?= date('d/m/Y', strtotime($row['fecha'])); ?></div>
                <div class="note-content">
                    <p><strong>Evento:</strong> <?= htmlspecialchars($row['nombre_evento']); ?></p>
                    <p><strong>Descripción:</strong> <?= htmlspecialchars($row['descripcion']); ?></p>
                    <p><strong>Equipos:</strong></p>
                    <?= $row['equipos']; ?> <!-- Mostrar la lista de equipos con cantidades -->
                </div>
            </div>

            <!-- Línea pequeña y firmas -->
            <div class="small-line"></div> <!-- Línea pequeña encima de las firmas -->
            <div class="signatures">
                <div class="signature">
                    <div class="signature-label">Firma Técnico</div>
                </div>
                <div class="signature">
                    <div class="signature-label">Firma Encargado</div>
                </div>
            </div>

            <script>
                // Imprimir la página automáticamente al cargar
                window.onload = function() {
                    window.print();
                }
            </script>
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