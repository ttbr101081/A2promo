<?php
    include_once 'productos.php';

    if(isset($_GET['categoria'])){
        $categoria = $_GET['categoria'];

        if($categoria == ''){
            echo json_encode(['statuscode'=> 400, 'response'=> 'No existe esa categoria']);
        }else{
            $productos = new Productos();
            $items = $productos->getItemsByCategory($categoria);

            echo json_encode(['statuscode'=> 200, 'items'=>$items]);
        }
    }else if(isset($_GET['get_item'])){
        $id = $_GET['get_item'];

        if($id == ''){
            echo json_encode(['statuscode' => 400, 'response' => 'No hay valor para id']);
        }else{
            $productos = new Productos();
            $item = $productos->get($id);
            echo json_encode(['statuscode' => 200, 'item' => $item]);
        }
    }else{
        //echo json_encode(['statuscode' => 400, 'response' => 'No hay accion']);
        $productos = new Productos();
        $items = $productos->getItems();

        echo json_encode(['statuscode'=> 200, 'items'=>$items]);
    }
?>