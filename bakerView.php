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
$ingredientb=getingredientsb($db_handle);
$ingredients = getingredientsBaker($db_handle);
$base=getpizzabase($db_handle);
$recentOrder=recentOrder($db_handle);
$supplier=getSupplier($db_handle)
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

                    <div class="col-lg-6 table-responsive">
                    <h3>Recent Orders</h3>


                    <table class="table table-bordered table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Ingredient</th>
                            <th>Base Size</th>
                            <th>Ordered Time</th>
                        </tr>

                        <?php foreach ($recentOrder as $order) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['order_id']) ?></td>
                                <td><?php echo htmlspecialchars($order['ingredients']); ?></td>
                                <td><?php echo htmlspecialchars($order['base_size']); ?></td>
                                <td><?php echo htmlspecialchars($order['ordered_time']); ?></td>

                            </tr>
                        <?php endforeach; ?>



                    </table>
                </div>
                    <div class="col-lg-6 table-responsive">
                    <h3>Ingredients  <button type="button" name="addin" id="addin" data-toggle="modal" data-target="#addin_data_Modal" class="btn btn-warning">Add Ingredient</button> <br> </h3><br>


                    <table class="table table-bordered table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Ingredient Name</th>
<!--                            <th>Regional Province</th>-->
<!--                            <th>Supplier</th>-->
                            <th>Hide/Show</th>
                        </tr>
                        </thead>
                        <?php foreach ($ingredients as $ingredient) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($ingredient['id']) ?></td>
                            <td><?php echo htmlspecialchars($ingredient['ingredient_name']); ?></td>
<!--                            <td>--><?php //echo htmlspecialchars($ingredient['region_name']); ?><!--</td>-->
<!--                            <td>--><?php //echo htmlspecialchars($ingredient['supplier_name']); ?><!--</td>-->
                            <td><input type="button" name="hide" value="
                            <?php
                                $t = $ingredient['flag'];

                                if ($t== "t") {
                                    echo "Hide";
                                }
                                else{
                                    echo "Show";
                                }
                                ?>"   id="<?php echo htmlspecialchars($ingredient['id']) ?>" class="btn btn-warning btn-xs hide_ing"  /></td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 table-responsive">
                    <h3>Ingredients Detail  <button type="button" name="addi" id="addi" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button></h3>


                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
<!--                            <th>Id</th>-->
                            <th>Ingredient Name</th>
                            <th>Regional Province</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php foreach ($ingredientb as $ingredientb) : ?>
                            <tr>
<!--                                <td>--><?php //echo htmlspecialchars($ingredientb['id']) ?><!--</td>-->
                                <td><?php echo htmlspecialchars($ingredientb['ingredient_name']); ?></td>
                                <td><?php echo htmlspecialchars($ingredientb['region_name']); ?></td>
                                <td><?php echo htmlspecialchars($ingredientb['price']); ?></td>
                                <td><?php echo htmlspecialchars($ingredientb['stock']); ?></td>
                                <td><?php echo htmlspecialchars($ingredientb['supplier_name']); ?></td>
                                <td>
                                   <div><input type="button" name="edit" value="Edit" id="<?php echo $ingredientb['id']; ?>" class="btn btn-info btn-xs edit_data" /></div>
                                    <div><input type="button" name="delete" value="Delete" id="<?php echo $ingredientb['id']; ?>" class="btn btn-danger btn-xs delete_data" /></div>
                                    <div><input type="button" name="restock" value="Restock" id="<?php echo $ingredientb['id']; ?>" class="btn btn-warning btn-xs restock_data" /></div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
                    <div class="col-lg-6 table-responsive">
                        <h3>Supplier   <button type="button" name="adds" id="adds" data-toggle="modal" data-target="#add_supp" class="btn btn-warning">Add</button></h3>



                        <table class="table table-bordered table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Supplier Name</th>
                                <th>Supplied Ingredients</th>
                                <th>Hide/Show</th>
                                <th>Actions</th>
                                <!--                            <th>Price</th>-->
                                <!--                            <th>Stock</th>-->
                                <!--                            <th>Supplier</th>-->
                            </tr>
                            </thead>
                            <?php foreach ($supplier as $supplier) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($supplier['id']) ?></td>
                                    <td><?php echo htmlspecialchars($supplier['supplier_name']); ?></td>
                                    <td><?php echo htmlspecialchars($supplier['ingredient_name']); ?></td>
                                    <td><input type="button" name="hide" value="<?php
                                        $t = $supplier['flag'];

                                        if ($t== "t") {
                                            echo "Hide";
                                        }
                                        else{
                                            echo "Show";
                                        }
                                        ?>"   id="<?php echo htmlspecialchars($supplier['id']) ?>" class="btn btn-warning btn-xs hide_supp"  /></td>
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $supplier['id']; ?>" class="btn btn-info btn-xs edit_supp_data" />
                                    <input type="button" name="edit" value="Delete" id="<?php echo $supplier['id']; ?>" class="btn btn-danger btn-xs del_supp_data" /></td>

                                </tr>
                            <?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </body>
    </html>
    <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingredient Details</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="update_form">
                    <label>Ingredient Name</label>
                    <select  name="iname" id="iname">

                        <?php
                        // Fetch Department
                        $sql =  "select * from get_ing()" ;

                        $result = pg_query($db_handle, $sql);
                        while($row = pg_fetch_assoc($result) ){
                            $ingredient_id = $row['id'];
                            $ingredient_name = $row['ingredient_name'];

                            // Option
                            echo "<option value=".$ingredient_id.">".$ingredient_name."</option>";
                        }
                        ?>

                    </select>
                    <br>
                    <label>Region Name</label>
                    <select  name="sel_region" id="sel_region">

                        <?php
                        // Fetch Department
                        $sql =  "select * from get_region()" ;

                        $result = pg_query($db_handle, $sql);
                        while($row = pg_fetch_assoc($result) ){
                            $regionid = $row['id'];
                            $region_name = $row['region_name'];

                            // Option
                            echo "<option value=".$regionid.">".$region_name."</option>";
                        }
                        ?>

                    </select>
                    <br>
                    <label>Price</label>
                    <input type="text" name="price" id="price" class="form-control" />
                    <br>
                    <label>Supplier</label>
                    <select  name="sel_sup">

                        <?php
                        $sql =  "select * from get_onlysupplier()" ;

                        $result = pg_query($db_handle, $sql);
                        while($row = pg_fetch_assoc($result) ){
                            $supplierid = $row['id'];
                            $suppliername = $row['name'];

                            // Option
                            echo "<option value=".$supplierid.">".$suppliername."</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <label>Stock</label>
                    <input type="text" name="stock" id="stock" class="form-control" />
                    <br>
                    <input type="hidden" name="ingredient_id" id="ingredient_id" value=""/>
                    <input type="submit" name="inserti" id="inserti" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <div id="addin_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingredient Details</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="add_form">
                    <label>Ingredient Name</label>
                    <input type="text" name="inamein" id="inamein" class="form-control"  />
                    <input type="submit" name="insertin" id="insertin" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <div id="add_supp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Supplier Details</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="update_supp_form">
                    <label>Supplier Name</label>
                    <input type="text" name="sname" id="sname" class="form-control" />
                    <input type="hidden" name="supplier_id" id="supplier_id" value=""/>
                    <input type="submit" name="inserts" id="inserts" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#adds').click(function(){
            $('#inserts').val("Insert");
            $('#update_supp_form')[0].reset();
        });
        $('#addi').click(function(){
            $('#inserti').val("Insert");
            $('#update_form')[0].reset();
            $("#iname").removeAttr('disabled');
        });
        $(document).on('click', '.edit_data', function () {
            $("#iname").attr('disabled','disabled');
            var ingredient_id = $(this).attr("id");
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {ingredient_id: ingredient_id},
                dataType: "json",
                success: function (data) {
                    // alert(data)
                    $('#ingredient_id').val(data.id);
                    $('#iname').val(data.ingredient_name);
                    $('#price').val(data.price);
                    $('#stock').val(data.stock);
                    $('#inserti').val("Update");
                    $('#add_data_Modal').modal('show');

                }
            });
        });
        $(document).on('click', '.edit_supp_data', function () {
            var supplier_id = $(this).attr("id");
            $.ajax({
                url: "fetchSupp.php",
                method: "POST",
                data: {supplier_id: supplier_id},
                dataType: "json",
                success: function (data) {
                    // alert(data)
                    $('#supplier_id').val(data.id);
                    $('#sname').val(data.supp_name);
                    $('#inserts').val("Update");
                    $('#add_supp').modal('show');

                }
            });
        });

        $(document).on('click', '.delete_data', function () {
            var ingredient_id = $(this).attr("id");
            alert(ingredient_id);
            $.ajax({
                url: "deleteIng.php",
                method: "POST",
                data: {ingredient_id: ingredient_id},
                dataType: "json",
                success: function (data) {
                    alert("Deleted");
                    // $('#ingredient_id').val(data.id);
                    // $('#iname').val(data.ingredient_name);
                    // $('#price').val(data.price);
                    // $('#stock').val(data.stock);
                    // $('#insert').val("Update");
                    // $('#add_data_Modal').modal('hide');
                }
            });
        });
        $(document).on('click', '.del_supp_data', function () {
            var supplier_id = $(this).attr("id");
            alert(supplier_id);
            $.ajax({
                url: "deleteSupp.php",
                method: "POST",
                data: {supplier_id: supplier_id},
                dataType: "json",
                success: function (data) {
                    alert("Deleted");
                    // $('#ingredient_id').val(data.id);
                    // $('#iname').val(data.ingredient_name);
                    // $('#price').val(data.price);
                    // $('#stock').val(data.stock);
                    // $('#insert').val("Update");
                    // $('#add_data_Modal').modal('hide');
                }
            });
        });

        $(document).on('click', '.restock_data', function () {
            var ingredient_id = $(this).attr("id");
            alert(ingredient_id);
            $.ajax({
                url: "restockIng.php",
                method: "POST",
                data: {ingredient_id: ingredient_id},
                dataType: "json",
                success: function (data) {
                    alert("Restocked")
                    // $('#ingredient_id').val(data.id);
                    // $('#iname').val(data.ingredient_name);
                    // $('#price').val(data.price);
                    // $('#stock').val(data.stock);
                    // $('#insert').val("Update");
                    // $('#add_data_Modal').modal('show');
                }
            });
        });

        $(document).on('click', '.hide_ing', function () {
            alert("here");
            var ingredient_id = $(this).attr("id");
            $.ajax({
                url: "hideIng.php",
                method: "POST",
                data: {ingredient_id: ingredient_id},
                dataType: "json",
                success: function (data) {
                    alert(data.hide_ingredient);
                    // $('#ingredient_id').val(data.id);
                    // $('#iname').val(data.ingredient_name);
                    // $('#price').val(data.price);
                    // $('#stock').val(data.stock);

                    // $('#'+ingredient_id).val("Show");
                    // $('#add_data_Modal').modal('show');
                }
            });
        });
        $(document).on('click', '.hide_supp', function () {
            // alert("here");
            var supplier_id = $(this).attr("id");
            alert(supplier_id)
            $.ajax({
                url: "hideSupp.php",
                method: "POST",
                data: {supplier_id: supplier_id},
                dataType: "json",
                success: function (data) {
                    alert(data.hide_supplier);
                    // $('#ingredient_id').val(data.id);
                    // $('#iname').val(data.ingredient_name);
                    // $('#price').val(data.price);
                    // $('#stock').val(data.stock);

                    // $('#'+ingredient_id).val("Show");
                    // $('#add_data_Modal').modal('show');
                }
            });
        });

        $('#update_form').on("submit", function (event) {
            event.preventDefault();

            $.ajax({
                url: "update.php",
                method: "POST",
                data: $('#update_form').serialize(),
                beforeSend: function () {
                    $('#inserti').val("Inserting");
                },
                success: function (data) {
                    alert(data);
                    $('#update_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        });
        $('#add_form').on("submit", function (event) {
            event.preventDefault();

            $.ajax({
                url: "add.php",
                method: "POST",
                data: $('#add_form').serialize(),
                beforeSend: function () {
                    $('#insertin').val("Inserting");
                },
                success: function (data) {
                    alert(data);
                    $('#addin_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        });
        $('#update_supp_form').on("submit", function (event) {
            event.preventDefault();

            $.ajax({
                url: "update_supp.php",
                method: "POST",
                data: $('#update_supp_form').serialize(),
                beforeSend: function () {
                    $('#inserts').val("Inserting");
                },
                success: function (data) {
                    alert(data);
                    $('#update_supp_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        });
    });

</script>



