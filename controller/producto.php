<?php
    require_once("../config/conexion.php");
    require_once("../models/Producto.php");
    $producto = new Producto();
    switch($_GET["op"]){
        case "insert":
            $datos = $producto->insert_producto($_POST["rule_name"]);
            if (empty($_FILES["file"]["name"][0])) {
                // No se han subido archivos
            } else {
                foreach ($datos as $row) {
                    $countfiles = count($_FILES["file"]["name"]);
                    $ruta = "../assets/" . $row["rule_id"] . "/";
                    $files_arr = array();
                    if (!file_exists($ruta)) {
                        mkdir($ruta, 0777, true);
                    }
                    for ($index = 0; $index < $countfiles; $index++) {
                        $filename = $_FILES["file"]["name"][$index];
                        $tmp_filename = $_FILES["file"]["tmp_name"][$index];
                        $destino = $ruta . $filename;
                        
                        if (move_uploaded_file($tmp_filename, $destino)) {
                            $producto->insert_file($row["rule_id"], $destino); // Guardar la ruta del archivo en la base de datos
                            $files_arr[] = $destino; 
                        } else {
                            echo "Error al mover el archivo: $filename";
                        }
                    }
                }
            }
            echo json_encode($datos);
        break;
    }
?>
