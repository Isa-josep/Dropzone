<?php
    require_once("../config/conexion.php");
    require_once("../models/Producto.php");
    $producto = new Producto();
    switch($_GET["op"]){
        case "insert":
            $datos = $producto->insert_producto($_POST["rule_name"]);
            if($datos == 1){
                echo "Producto registrado correctamente";
            }else{
                echo "Error al registrar producto";
            }
        break;
    }
?>