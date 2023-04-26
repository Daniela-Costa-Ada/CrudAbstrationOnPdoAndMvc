<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;
class Supplier extends DataLayer
{
    public function __construct()
    {
        parent::__construct("suppliers", ["name"], "id",false);
    }
}