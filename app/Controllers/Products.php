<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Files\UploadedFile;

class Products extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index(): string
    {
        $products = model('App\Models\ProductModel')->orderBy('name')->findAll();

        return view('products', ['products' => $products]);
    }

    public function new(): string
    {
        return view('product_form', ['product' => null]);
    }

    public function create()
    {
        $rules = [
            'name'           => 'required|max_length[100]',
            'price'          => 'required|decimal|greater_than_equal_to[0]',
            'stock_quantity' => 'required|is_natural',
            'image'          => 'permit_empty|is_image[image]|max_size[image,2048]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (! $this->validate($rules)) {
            return view('product_form', ['product' => null]);
        }

        $image = $this->storeImage($this->request->getFile('image'));
        model('App\Models\ProductModel')->insert([
            'name'           => trim((string) $this->request->getPost('name')),
            'price'          => (float) $this->request->getPost('price'),
            'stock_quantity' => (int) $this->request->getPost('stock_quantity'),
            'image'          => $image,
            'created_at'     => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(url_to('products'))->with('message', 'Product added.');
    }

    public function edit(int $id): string
    {
        $product = model('App\Models\ProductModel')->find($id);

        if ($product === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found.');
        }

        return view('product_form', ['product' => $product]);
    }

    public function update(int $id)
    {
        $model = model('App\Models\ProductModel');
        $product = $model->find($id);

        if ($product === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found.');
        }

        $rules = [
            'name'           => 'required|max_length[100]',
            'price'          => 'required|decimal|greater_than_equal_to[0]',
            'stock_quantity' => 'required|is_natural',
            'image'          => 'permit_empty|is_image[image]|max_size[image,2048]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (! $this->validate($rules)) {
            return view('product_form', ['product' => $product]);
        }

        $image = $product['image'];
        $uploadedImage = $this->request->getFile('image');
        if ($uploadedImage instanceof UploadedFile && $uploadedImage->isValid() && ! $uploadedImage->hasMoved()) {
            $this->removeImage($image);
            $image = $this->storeImage($uploadedImage);
        }

        $model->update($id, [
            'name'           => trim((string) $this->request->getPost('name')),
            'price'          => (float) $this->request->getPost('price'),
            'stock_quantity' => (int) $this->request->getPost('stock_quantity'),
            'image'          => $image,
        ]);

        return redirect()->to(url_to('products'))->with('message', 'Product updated.');
    }

    public function delete(int $id)
    {
        $model = model('App\Models\ProductModel');
        $product = $model->find($id);

        if ($product !== null) {
            $this->removeImage($product['image']);
            $model->delete($id);
        }

        return redirect()->to(url_to('products'))->with('message', 'Product deleted.');
    }

    private function storeImage(?UploadedFile $file): ?string
    {
        if (! $file instanceof UploadedFile || ! $file->isValid() || $file->hasMoved()) {
            return null;
        }

        $directory = FCPATH . 'uploads/products';
        if (! is_dir($directory)) {
            mkdir($directory, 0775, true);
        }

        $file->move($directory);

        return 'uploads/products/' . $file->getName();
    }

    private function removeImage(?string $image): void
    {
        if ($image !== null && str_starts_with($image, 'uploads/products/')) {
            $path = FCPATH . $image;
            if (is_file($path)) {
                unlink($path);
            }
        }
    }
}