<?php
    include_once 'carrito.php';

    if(isset($_GET['action'])){
        $accion = $_GET['action'];
        $carrito = new Carrito();

        switch($accion){
            case 'mostrar':
                mostrar($carrito);
            break;

            case 'add':
                add($carrito);
            break;

            case 'remove':
                remove($carrito);
            break;

            default;
        }
    }else{
        echo json_encode(['statuscode' => 404, 'response' => 'No se puede procesar la solicitud']);
    }

    function mostrar($carrito){
        //cargar arreglo
        //consultar base de datos
        $itemsCarrito = json_decode($carrito->load(), 1);
        $fullItems = [];
        $totalItems = 0;

        foreach($itemsCarrito as $itemCarrito){
            $httpRequest = file_get_contents('http://localhost/A2promo/api/productos/api_productos.php?get_item='.$itemCarrito['id']);
            $itemProducto = json_decode($httpRequest, 1)['item'];
            $itemProducto['cantidad'] = $itemCarrito['cantidad'];
            $totalItems += $itemProducto['cantidad'];

            array_push($fullItems, $itemProducto);

        }
        $resArray = array('info' => ['count' => $totalItems, 'items' => $fullItems]);

        echo json_encode($resArray);
    }

    function add($carrito){
        if(isset($_GET['id'])){
            $res = $carrito-> add($_GET['id']);
            echo $res;
        }else{
            echo json_encode(['statuscode' => 404, 'response' => 'No se puede procesar la solicitud, id vacio']);
        }
    }

    function remove($carrito){
        if(isset($_GET['id'])){
            $res = $carrito-> remove($_GET['id']);
            if($res){
                echo json_encode(['statuscode' => 200]);
            }else{
                echo json_encode(['statuscode' => 400]);
            }
        }else{
            echo json_encode(['statuscode' => 404, 'response' => 'No se puede procesar la solicitud, id vacio']);
        }
    }
?>