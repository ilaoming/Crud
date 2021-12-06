<?php
    require_once("../config/conexion.php");
    require_once("../models/Producto.php");

    $producto = new Producto();

    try {
        switch($_GET["op"]){
            case "listar":
                $datos=$producto->getProducto();
                $data = Array();
                foreach($datos as $row){
                    $subArray = array();
                    $subArray[] = $row["prod_nom"];
                    $subArray[] = '<button type="button" class="btn btn-outline-primary" onClick="editar('.$row["prod_id"].');" id="'.$row["prod_id"].'"><i class="fas fa-edit"></i></button>';
                    $subArray[] = '<button type="button" class="btn btn-outline-danger" onClick="eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'"><i class="fas fa-trash-alt"></i></button>';
                    $data[] = $subArray;
                }
    
                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data
                );
                echo json_encode($results);
    
                break;
        }
    } catch (Exception $e) {
        print($e);
    };



?>