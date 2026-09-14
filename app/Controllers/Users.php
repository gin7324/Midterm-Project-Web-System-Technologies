<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'admin', 'full_name' => 'Jordan Smith', 'role' => 'Administrator'],
            ['username' => 'cashier01', 'full_name' => 'Taylor Brown', 'role' => 'Cashier'],
            ['username' => 'cashier02', 'full_name' => 'Morgan Davis', 'role' => 'Cashier'],
            ['username' => 'manager01', 'full_name' => 'Casey Wilson', 'role' => 'Manager'],
            ['username' => 'inventory01', 'full_name' => 'Riley Garcia', 'role' => 'Inventory Clerk'],
        ];

        return view('users', ['users' => $users]);
    }
}