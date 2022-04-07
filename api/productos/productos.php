<?php
    include_once '../../lib/db.php';

    class Productos extends DB{

        function __construct(){
            parent::__construct();
        }

        public function get($id){
            $query = $this -> connect()-> prepare('SELECT * FROM product where product_id = :id and active = 1 limit 0,12');
            $query-> execute(['id' => $id]);

            $row = $query->fetch();

            return[
                'id'=>$row['product_id'],
                'nombre'=>$row['product_name'],
                'imagen'=>substr($row['product_image'],3),
            ];
        }

        public function getItemsByCategory($category){
            $query = $this -> connect()->prepare('SELECT * FROM product where categories_id = :cat and active = 1 limit 0,12');
            $query-> execute(['cat' => $category]);

            $items = [];

            while($row = $query-> fetch(PDO::FETCH_ASSOC)){
                $item = [
                    'id'=>$row['product_id'],
                    'nombre'=>$row['product_name'],
                    'imagen'=>substr($row['product_image'],3),
                ];
                array_push($items, $item);
            };
            return $items;
        }

        public function getItems(){
            $query = $this -> connect()->prepare('SELECT * FROM product where active = 1 limit 0,12');
            $query-> execute();

            $items = [];

            while($row = $query-> fetch(PDO::FETCH_ASSOC)){
                $item = [
                    'id'=>$row['product_id'],
                    'nombre'=>$row['product_name'],
                    'imagen'=>substr($row['product_image'],3),
                ];
                array_push($items, $item);
            };
            return $items;
        }
    }
?>