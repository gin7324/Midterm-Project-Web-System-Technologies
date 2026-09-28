<?php

namespace App\Controllers;

class Sales extends BaseController
{
    public function index(): string
    {
        $sales = model('App\Models\SaleModel')->history();

        return view('sales', ['sales' => $sales]);
    }
}