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
<form action="showsdata.php" method="post">
    Produto: <input type=text name=produto><br>
    Fornecedor: <input type=text name=fornecedor><br>
    Valor: <input type=text name=valor><br>
    <input type=submit value="OK">
</form>
</html>
<h1> Teste</h1>
<?php
require __DIR__ ."/vendor/autoload.php";
$crud = new Source\Crud\Crud();

//$crud->updateSupplier(15);
//$crud->deleteSupplier(22);
$crud->read();
//$crud->addSupplier();
//$crud->addProduct();
//$crud->addProductSuppliers();

?>
