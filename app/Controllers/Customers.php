<?php

namespace App\Controllers;

class Customers extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index(): string
    {
        $customers = model('App\Models\CustomerModel')->orderBy('full_name')->findAll();

        return view('customers', ['customers' => $customers]);
    }

    public function new(): string
    {
        return view('customer_form', ['customer' => null]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return view('customer_form', ['customer' => null]);
        }

        model('App\Models\CustomerModel')->insert([
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')) ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(url_to('customers'))->with('message', 'Customer added.');
    }

    public function edit(int $id): string
    {
        $customer = model('App\Models\CustomerModel')->find($id);

        if ($customer === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found.');
        }

        return view('customer_form', ['customer' => $customer]);
    }

    public function update(int $id)
    {
        $model = model('App\Models\CustomerModel');
        $customer = $model->find($id);

        if ($customer === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found.');
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return view('customer_form', ['customer' => $customer]);
        }

        $model->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')) ?: null,
        ]);

        return redirect()->to(url_to('customers'))->with('message', 'Customer updated.');
    }

    public function delete(int $id)
    {
        model('App\Models\CustomerModel')->delete($id);

        return redirect()->to(url_to('customers'))->with('message', 'Customer deleted.');
    }
}