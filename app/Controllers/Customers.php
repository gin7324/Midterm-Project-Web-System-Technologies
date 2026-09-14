<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['full_name' => 'Ava Rodriguez', 'email' => 'ava.rodriguez@example.com', 'phone' => '555-0101'],
            ['full_name' => 'Liam Chen', 'email' => 'liam.chen@example.com', 'phone' => '555-0102'],
            ['full_name' => 'Mia Johnson', 'email' => 'mia.johnson@example.com', 'phone' => '555-0103'],
            ['full_name' => 'Noah Williams', 'email' => 'noah.williams@example.com', 'phone' => '555-0104'],
            ['full_name' => 'Sophia Patel', 'email' => 'sophia.patel@example.com', 'phone' => '555-0105'],
        ];

        return view('customers', ['customers' => $customers]);
    }
}