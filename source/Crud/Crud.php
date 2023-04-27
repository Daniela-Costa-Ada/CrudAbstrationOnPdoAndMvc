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

    public function updateSupplier(int $id)
    {
        $this->supplier = (new Supplier())->findById($id);
        $this->supplier->name = "microsoft";
        $this->supplier->save();
    }
    public function deleteSupplier( int $id) {
        $this->supplier = (new Supplier())->findById($id);
        if($this->supplier) {
            $this->supplier->destroy();
            echo "Fornecedor deletado!";
        } else {
            echo "Fornecedor nao existe";
        }
    }
    public function addProduct(string $productName)
    {
        $this->product = new Product();
        $this->product->product_name = $productName;
        $this->product->save();
    }
    public function updateProduct(int $id)
    {
        $this->product = (new Product())->findById($id);
        $this->product->product_name = "mesa";
        $this->product->save();
    }

    /**
     * Delete the products tables
     * it also deletes the relationship of this product with the supplier because if a product no longer exists,
     * there is alsorelationship with the supplier but this can be refactored according to the idea of the business rule
     */
    public function deleteProduct( int $id) {
        $this->product = (new Product())->findById($id);
        if($this->product) {
            $this->product->destroy();
            $this->getIdProductSupplier($id);
            echo "Produto deletado!";
        } else {
            echo "Produto nao existe";
        }
    }
    public function addProductSuppliers(float $price)
    {
        $this->products_supplier = new Products_supplier();
        $this->products_supplier->id_product =  $this->product->id;
        $this->products_supplier->id_suppliers = $this->supplier->id;
        $this->products_supplier->price = $price;
        $this->products_supplier->save();
    }
    /** just update the price the table relation ProductSuppliers */
    public function updatePriceProductSuppliers(int $id)
    {
        $this->products_supplier = (new Products_supplier())->findById($id);
        echo "Preço antigo: " . $this->products_supplier->price;
        $this->products_supplier->price = 546.67;
        $this->products_supplier->save();
        echo "Preço novo: " . $this->products_supplier->price;

    }

    /**
     * Delete the product's relationship with the supplier
     */
    public function deleteProductSuplier(int $id)
    {
        $this->products_supplier = (new Products_supplier())->findById($id);
        if($this->products_supplier) {
            $this->products_supplier->destroy();
            echo "Relação do produto com Fornecedor deletada!";
        } else {
            echo "Relação do produto com Fornecedor nao existe";
        }
    }

    /**
     * getIdProductSupplier: Receives product table id to relate to product id from
     * ProductSupplier association table, calls delete function to delete data with table id.
     */
    public function getIdProductSupplier(int $idProduto) {
        $this->products_supplier = new Products_supplier();
        $list = $this->products_supplier->find()->fetch(true);
        foreach ($list as $products_supplierItem) {
            if ($idProduto == $products_supplierItem->data()->id_product )
            {
                $this->deleteProductSuplier($products_supplierItem->data()->id);
            }
        }
    }
    /**
     * Function for reading product and supplier data,
     * it can be done for reading each table at a time.
     * Refactor Later:
     * It can also be written to make an adapted reading how to read products
     *  and their values, and the suppliers
     * The function can also contain just what it does: read the data from
     *  the database, returned by the function and thus sent to a view to make the display cleaner.
     **/
    public function read() {
        $this->supplier = new Supplier();
        $this->product = new  Product();
        $this->products_supplier = new Products_supplier();
        $list = $this->supplier->find()->fetch(true);
        echo "<h1> TABELA FORNECEDOR: </h1>";
        foreach ($list as $supplierItem) {
            echo "Id do Fornecedor: ", $supplierItem->data()->id, ", ";
            echo "<br>";
            echo "Nome do Fornecedor: ", $supplierItem->data()->name, ", ";
            echo "<br>";
            echo "Data de Cadastro: ", $supplierItem->data()->registrationDate, ", ";
            echo "<br>";
        }

        $list = $this->product->find()->fetch(true);
        echo "<h1> TABELA PRODUTO: </h1>";
        foreach ($list as $productItem) {

            echo "Id do produto: ", $productItem->data()->id, ", ";
            echo "<br>";
            echo "Nome do Produto: ", $productItem->data()->product_name, ", ";
            echo "<br>";
            echo "Data de Cadastro: ", $productItem->data()->registrationDate, ", ";
            echo "<br>";
        }

        $list = $this->products_supplier->find()->fetch(true);
        echo "<h1> RELAÇÃO ENTRE AS TABELAS </h1>";
        foreach ($list as $products_suppliers) {

            echo "Id do Fornecedor: ", $products_suppliers->data()->id_suppliers, ", ";
            echo "<br>";
            echo "Id do Produto: ", $products_suppliers->data()->id_product, ", ";
            echo "<br>";
            echo "Preço: ", $products_suppliers->data()->price, ", ";
            echo "<br>";
            echo "Data de Cadastro: ", $products_suppliers->data()->registrationDate, ", ";
            echo "<br>";
        }
    }
}