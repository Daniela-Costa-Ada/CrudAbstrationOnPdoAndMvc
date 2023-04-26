<?php

require __DIR__ . "/vendor/autoload.php";
$crud = new Source\Crud\Crud();

//$crud->updateSupplier(15);
//$crud->deleteSupplier(22);
$crud->read();
$crud->addSupplier($_POST["fornecedor"]);
$crud->addProduct($_POST["produto"]);
$crud->addProductSuppliers($_POST["valor"]);

