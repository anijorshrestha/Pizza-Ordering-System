<?php
include 'database.php';
include 'functions.php';
//$host = "pgsql.hrz.tu-chemnitz.de";
//$port = "5432"; // should be 5432
//$databaseName = "rojina_pizza_db";
//$userName = "rojina_pizza_db_rw";
//$password = "quu5CeeC";
//
//$db_handle = pg_connect("host=" . $host . " port=" . $port . " dbname=" . $databaseName . " user=" . $userName . " password=" . $password) or die("Die Verbindung konnte nicht aufgebaut werden.");
$tableName = "pizzen";
$pizza_curs ="pizza_curs";
$ing_curs ="ing_curs";
$ingredients = getingredients($db_handle);
$base=getpizzabase($db_handle);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Pizza Center</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body >
<div class="jumbotron text-center">
<h3>PIZZA SHOP</h3>
</div>
<div class="container">
    <form action='' method='POST'>
    <div class="row">

        <div class="col-sm-6" >
        <h3>Ingredients</h3>


                    <table class="table table-bordered ">
                    <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Ingredient</th>
                        <th>Region</th>
                        <th>Price</th>
                        <th>Check</th>
                    </tr>

                        <?php foreach ($ingredients as $ingredient) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($ingredient['id']) ?></td>
                        <td><?php echo htmlspecialchars($ingredient['ingredient_name']); ?></td>
                        <td><?php echo htmlspecialchars($ingredient['region_name']); ?></td>
                        <td><?php echo htmlspecialchars($ingredient['price']); ?></td>
                        <td><input type="checkbox" name='ingid[]' value="<?php echo htmlspecialchars($ingredient['id'])?>"></td>
                    </tr>
                        <?php endforeach; ?>



            </table>
        </div>
        <div class="col-sm-6">
        <h3>Pizza Base</h3>


                    <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Pizza Size</th>
                            <th>Price</th>
                            <th>Check</th>
                        </tr>
                    </thead>

                        <?php foreach ($base as $base) : ?>
                     <tr>
                        <td><?php echo htmlspecialchars($base['id']) ?></td>
                        <td><?php echo htmlspecialchars($base['base_size']); ?></td>
                        <td><?php echo htmlspecialchars($base['price']); ?></td>
                        <td><input type="checkbox" name='baseid[]' value="<?php echo htmlspecialchars($base['id'])?>"></td>
                    </tr>
                        <?php endforeach; ?>

                    </table>



        </div>


    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-4"><input type="submit" value="Submit" name="submit"></div>
        <div class="col-sm-3"></div>
    </div>
    </form>
</body>
</html>


<?php
if(isset($_POST['submit'])){
    $ing=array();

    $basevalue=0;
    if(!empty($_POST['ingid'])) {

        foreach($_POST['ingid'] as $valuei){
//            echo "Ing id : ".$valuei.'<br/>';
            array_push($ing, "$valuei");

        }


    }

    if(!empty($_POST['baseid'])) {

        foreach($_POST['baseid'] as $valueb){
//            echo "Base Id : ".$valueb.'<br/>';
            $basevalue=$valueb;
        }

    }
    echo "Your order has been placed.";
    add_order($db_handle,$ing,$basevalue);

}


