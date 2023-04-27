<?php
namespace Source\Crud;
use Source\Models\Product;
use Source\Models\Products_supplier;
use Source\Models\Supplier;


class Crud
{
    /** @var Supplier */
    protected $supplier;

    /** @var Product */
    protected $productSuppliers;

    /** @var Products_supplier */
    protected $products_supplier;


    public function __construct()
    {
        $this->supplier = new Supplier();
        $this->product = new Product();
        $this->products_supplier = new Products_supplier();
    }

    public function addSupplier(string $name)
    {
        $this->supplier = new Supplier();
        $this->supplier->name = $name;
        $this->supplier->save();
    }
    public function addProduct(string $productName)
    {
        $this->product = new Product();
        $this->product->product_name = $productName;
        $this->product->save();
    }
    public function addProductSuppliers(float $price)
    {
        $this->products_supplier = new Products_supplier();
        $this->products_supplier->id_product =  $this->product->id;
        $this->products_supplier->id_suppliers = $this->supplier->id;
        $this->products_supplier->price = $price;
        $this->products_supplier->save();
    }
    public function updateSupplier(int $id)
    {
        $this->supplier = (new Supplier())->findById($id);
        $this->supplier->name = "mostrando como funciona";
        $this->supplier->save();
    }
    public function updateProduct(int $id)
    {
        $this->product = (new Product())->findById($id);
        $this->product->product_name = "microfone";
        $this->product->save();
    }
    public function deleteSupplier( int $id) {
        $this->supplier = (new Supplier())->findById($id);
        if($this->supplier) {
            $this->supplier->destroy();
            echo "Fornecedor deletado!";
        } else {
            echo"Fornecedor nao existe";
        }
    }

    public function deleteProduct( int $id) {
        $this->product = (new Product())->findById($id);
        if($this->product) {
            $this->product->destroy();
            $this->idd($id);
            echo "Produto deletado!";
        } else {
            echo"Produto nao existe";
        }
    }
    public function deleteProductSuplier(int $id)
    {

            $this->products_supplier = (new Products_supplier())->findById($id);
            if($this->products_supplier) {
                $this->products_supplier->destroy();
                echo "deletado!";
            } else {
                echo"nao existe";
            }



    }
    public function idd(int $idProduto) {
        $this->products_supplier = new Products_supplier();
        $list = $this->products_supplier->find()->fetch(true);
        foreach ($list as $supplierItem) {
            if ($idProduto == $supplierItem->data()->id_product )
            {
               $this->deleteProductSuplier( $supplierItem->data()->id);
            }
//            echo "IDproduto: ", $supplierItem->data()->id_product, ", ";
//            echo "id: ", $supplierItem->data()->id, ", ";
//            echo "idsupplier: ", $supplierItem->data()->id_suppliers, ", ";
//
//            echo "Data de Cadastro: ", $supplierItem->data()->registrationDate, ", ";
//            return $supplierItem->data()->id;
        }
    }

    public function read() {
        $this->supplier = new Supplier();
        $list = $this->supplier->find()->fetch(true);
        foreach ($list as $supplierItem) {
            echo "ID: ", $supplierItem->data()->id, ", ";
            echo "Nome: ", $supplierItem->data()->name, ", ";
            echo "Data de Cadastro: ", $supplierItem->data()->registrationDate, ", ";
        }
    }
}