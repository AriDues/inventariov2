<?php
    /*== Almacenando datos ==*/
    $product_id_del = limpiar_cadena($_GET['product_id_del']);

    // Verificar que el ID sea un número válido
    if (!is_numeric($product_id_del)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Error!</strong><br>
                El ID del producto no es válido
            </div>
        ';
        exit;
    }

    /*== Verificando producto ==*/
    $check_producto = conexion();
    $check_producto = $check_producto->query("SELECT * FROM producto WHERE producto_id='$product_id_del'");

    if ($check_producto->rowCount() == 0) {
        echo '
            <div class="notification is-warning is-light">
                <strong>¡Advertencia!</strong><br>
                El producto que intentas eliminar no existe o ya ha sido eliminado
            </div>
        ';
        exit;
    }

    $datos = $check_producto->fetch();

    $eliminar_producto = conexion();
    $eliminar_producto = $eliminar_producto->prepare("DELETE FROM producto WHERE producto_id=:id");

    $eliminar_producto->execute([":id" => $product_id_del]);

    if ($eliminar_producto->rowCount() == 1) {
        if (is_file("./img/producto/" . $datos['producto_foto'])) {
            chmod("./img/producto/" . $datos['producto_foto'], 0777);
            unlink("./img/producto/" . $datos['producto_foto']);
        }

        echo '
            <div class="notification is-info is-light">
                <strong>¡EQUIPO ELIMINADO!</strong><br>
                Los datos del producto se eliminaron con éxito
            </div>
        ';
        // Redirigir después de 2 segundos
        header("Refresh: 2; url=lista_productos.php");
        exit;
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se pudo eliminar el equipo, por favor intente nuevamente
            </div>
        ';
    }

    $eliminar_producto = null;
    $check_producto = null;
?>