<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Product extends DataLayer
{
    public function __construct()
    {
        parent::__construct("products", ["product_name"], "id", false);
    }
}