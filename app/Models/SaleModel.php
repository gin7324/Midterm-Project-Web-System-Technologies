<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'sales';
    protected $returnType = 'array';

    public function history(): array
    {
        return $this->select('sales.id, products.name AS product_name, customers.full_name AS customer_name, users.full_name AS staff_name, sales.quantity, sales.total_price, sales.created_at')
            ->join('products', 'products.id = sales.product_id')
            ->join('customers', 'customers.id = sales.customer_id', 'left')
            ->join('users', 'users.id = sales.sold_by')
            ->orderBy('sales.created_at', 'DESC')
            ->orderBy('sales.id', 'DESC')
            ->findAll();
    }
}