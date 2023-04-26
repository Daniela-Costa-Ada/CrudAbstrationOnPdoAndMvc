<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Products_supplier extends DataLayer
{
    public function __construct()
    {
        parent::__construct("products_suppliers", ["id_product", "id_suppliers", "price"],"id", false);
    }
}