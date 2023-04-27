<?php

require __DIR__ . "/vendor/autoload.php";
$crud = new Source\Crud\Crud();
/**
 * Uncomment the functions to test!
 */

/**
 * Crud to add, delete, update and read a supplier
 */
$crud->addSupplier($_POST["fornecedor"]);
//$crud->deleteSupplier(93);
//$crud->updateSupplier(87);
//$crud->read();


/**
 * Crud to add, delete, update and read a product
 * When deleting a product, it is automatically deleted from the table associated with a supplier
 */
$crud->addProduct($_POST["produto"]);
//$crud->deleteProduct(62);
//$crud->updateProduct(33);


/**
 * Crud to add, delete, update and read a product and supplier
 */
$crud->addProductSuppliers($_POST["valor"]);
//$crud->updatePriceProductSuppliers(40);
//$crud->deleteProductSuplier(19);
$crud->read();










