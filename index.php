<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product and Suppliers</title>
</head>
<body>
<h1> Adicione produto, fornecedor e valor </h1>
<form action="showsdata.php" method="post">
    Produto: <input type=text name=produto><br>
    Fornecedor: <input type=text name=fornecedor><br>
    Valor: <input type=text name=valor><br>
    <input type=submit value="OK">
</form>
</html>
<?php
require __DIR__ ."/vendor/autoload.php";
$crud = new Source\Crud\Crud();
/**
 * Uncomment the functions to test!
 */
//$crud->updatePriceProductSuppliers(46);
//$crud->deleteSupplier(93);
//$crud->deleteProductSuplier(39);

/**
 * Crud to add, delete, update and read a supplier
 */
//$crud->addSupplier($_POST["fornecedor"]);
//$crud->deleteSupplier(94);
//$crud->updateSupplier(96);
//$crud->read();

/**
 * Crud to add, delete, update and read a product
 * When deleting a product, it is automatically deleted from the table associated with a supplier
 *
 */
//$crud->addProduct($_POST["produto"]);
//$crud->deleteProduct(71);
//$crud->updateProduct(72);
?>
