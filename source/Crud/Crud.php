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
        echo 'oi';
        $this->supplier->save();
    }
    public function deleteSupplier( int $id) {
        $this->supplier = (new Supplier())->findById($id);
        if($this->supplier) {
            $this->supplier->destroy();
            var_dump("Deletado funciona o delete");
        } else {
            var_dump("usuario nao existe");
        }
    }
    public function read(){
        $this->supplier = new Supplier();
        $list = $this->supplier->find()->fetch(true);
        //var_dump($list);
        foreach ($list as $supplierItem) {
            echo "ID: ", $supplierItem->data()->id, ", ";
            echo "Nome: ", $supplierItem->data()->name, ", ";
            echo "Nome: ", $supplierItem->data()->registration_date, ", ";
            echo "/funciona o read/ ";
        }
    }
}