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
                    $subArray[] = $row["prod_desc"];
                    
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

                case "guardarEditar":
                    $datos=$producto->getProductoById($_POST["prod_id"]);
                    if(empty($_POST["prod_id"])){
                        if(is_array($datos)==true and count($datos)==0){
                            $producto->insertProducto($_POST["prod_nom"],$_POST["prod_desc"]);
                        }
                    }else{
                        $producto->updateProducto($_POST["prod_id"],$_POST["prod_nom"],$_POST["prod_desc"]);
                    }
                    break;
        
                case "mostrar":
                    $datos=$producto->getProductoById($_POST["prod_id"]);
                    if(is_array($datos)==true and count($datos)>0){
                        foreach($datos as $row){
                            $output["prod_id"] = $row["prod_id"];
                            $output["prod_nom"] = $row["prod_nom"];
                            $output["prod_desc"] = $row["prod_desc"]; 
                        }
                        echo json_encode($output);
                    }
                    break;
        
                case "eliminar":
                    $producto->deleteProducto($_POST["prod_id"]);
                    break;
        }




?>