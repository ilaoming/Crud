<?php
    require_once("../config/conexion.php");
    require_once("../models/Producto.php");

    $producto = new Producto();

    switch($_GET["op"]){
        case "listar":
            $datos=$producto->getProducto();
            $data = Array();
            foreach($datos as $row){
                $subArray = array();
                $subArray[] = $row["prod_nom"];
                $subArray[] = '<button type="button" class="btn btn-outline-primary" onClick="editar('.$row["prod_id"].');" id="'.$row["prod_id"].'"></button>';
                $subArray[] = '<button type="button" class="btn btn-outline-warning" onClick="eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'"></button>';
                $data[] = $subArray;
            }
            break;
    }

?>