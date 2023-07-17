<?php
    header('Content-Type: application/json');

    require_once("E:\aquiii\htdocs\proyectoentrada\config\conexion.php");
    require_once("E:\aquiii\htdocs\proyectoentrada\models\Categoria.php");
    $categoria= new  Categoria();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetAll":
            $datos=$categoria->get_Categoria();
            echo json_encode($datos);
            break;
        case "GetId":
            $datos=$categoria->get_Categoria_x_id($body["cat_id"]);
            echo json_encode($datos);
            break;
        case "Insert":
            $datos=$categoria->insert_Categoria($body["cat_nom"], $body["cat_obs"]);
                echo "Insert Correcto";
            break;
        case "Update":
            $datos=$categoria->update_Categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
                    echo "Update Correcto";
            break;
        case "Delete":
            $datos=$categoria->delete_Categoria($body["cat_id"]);
                echo "Delete Correcto";
            break;        
    }


?>