
<?php
include "database.php";

function getingredients($db_handle) {
    $sql =  "select * from get_ingredients()" ;

    $result = pg_query($db_handle, $sql);

 $ingredients = [];
    while ($row = pg_fetch_assoc($result)) {
        $ingredients[]=[
            'id'=> $row['id'],
            'ingredient_name' => $row['ingredient_name'],
            'region_name' => $row['region_name'],
            'price' => $row['price'],
            'stock' => $row['stock'],
            'supplier_id' => $row['supplier_id'],
            'supplier_name' => $row['supplier_name']

        ]
        ;


    }
    return $ingredients;

}

function getingredientsb($db_handle) {
    $sql =  "select * from get_ingredientsb()" ;

    $result = pg_query($db_handle, $sql);

    $ingredients = [];
    while ($row = pg_fetch_assoc($result)) {
        $ingredients[]=[
            'id'=> $row['id'],
            'ingredient_name' => $row['ingredient_name'],
            'region_name' => $row['region_name'],
            'price' => $row['price'],
            'stock' => $row['stock'],
            'supplier_id' => $row['supplier_id'],
            'supplier_name' => $row['supplier_name']

        ]
        ;


    }
    return $ingredients;

}

function getpizzabase($db_handle) {
    $sql =  "select * from get_pizzabase()" ;

    $result = pg_query($db_handle, $sql);

    $base = [];
    while ($row = pg_fetch_assoc($result)) {
        $base[]=[
            'id'=> $row['id'],
            'base_size' => $row['base_size'],
            'price' => $row['price'],

        ]
        ;


    }
    return $base;

}

function add_order($db_handle,$ing,$base){
    $sql =  "select add_order_ing(array[".implode(', ',$ing)."],".$base.")" ;

    $result = pg_query($db_handle, $sql);

}

function recentOrder($db_handle) {
    $sql =  "select * from orders()" ;

    $result = pg_query($db_handle, $sql);

    $recentOrder = [];
    while ($row = pg_fetch_assoc($result)) {
        $recentOrder[]=[
            'order_id'=> $row['order_id'],
            'ingredients' => $row['ingredients'],
            'base_size' => $row['base_size'],
            'ordered_time' => $row['ordered_time'],

        ]
        ;


    }
    return $recentOrder;

}

function getingredientsbyid($db_handle) {
    $sql =  "select * from get_ingredientsById()" ;

    $result = pg_query($db_handle, $sql);

    $ingredients = [];
    while ($row = pg_fetch_assoc($result)) {
        $ingredients[]=[
            'id'=> $row['id'],
            'ingredient_name' => $row['ingredient_name'],
            'region_name' => $row['region_name'],
            'price' => $row['price'],
            'stock' => $row['stock'],
            'supplier_id' => $row['supplier_id'],
            'supplier_name' => $row['supplier_name']

        ]
        ;


    }
    return $ingredients;

}

function getingredientsBaker($db_handle)
{
    $sql =  "select * from get_ingredientsBaker()" ;

    $result = pg_query($db_handle, $sql);

    $ingredients = [];
    while ($row = pg_fetch_assoc($result)) {
        $ingredients[]=[
            'id'=> $row['id'],
            'ingredient_name' => $row['ingredient_name'],
//            'region_name' => $row['region_name'],
//            'supplier_name' => $row['supplier_name'],
            'flag' => $row['flag']

        ]
        ;


    }
    return $ingredients;
}

function getSupplier($db_handle)
{
    $sql =  "select * from get_supplier()" ;

    $result = pg_query($db_handle, $sql);

    $ingredients = [];
    while ($row = pg_fetch_assoc($result)) {
        $ingredients[]=[
            'id'=> $row['id'],
            'supplier_name' => $row['supplier_name'],
            'ingredient_name' => $row['ingredient_name'],
            'flag' => $row['flag']

        ]
        ;


    }
    return $ingredients;
}


