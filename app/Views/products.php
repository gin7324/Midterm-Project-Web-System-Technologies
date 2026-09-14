<?= view('_header', ['title' => 'Products | Peralta POS']) ?>
<p class="eyebrow">Inventory management</p>
<h1>Products</h1>
<p class="intro">Manage product prices, stock quantities, and display-ready product images.</p>
<?php if ($message = session()->getFlashdata('message')): ?><p class="notice"><?= esc($message) ?></p><?php endif; ?>
<div class="actions"><a class="button" href="<?= url_to('products.new') ?>">Add product</a></div>
<section class="panel">
    <table>
        <thead><tr><th>Image</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr></thead>
        <tbody>
        <?php if ($products === []): ?><tr><td colspan="5">No products have been added yet.</td></tr><?php endif; ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php if (! empty($product['image'])): ?><img class="thumbnail" src="<?= base_url($product['image']) ?>" alt="<?= esc($product['name']) ?>"><?php else: ?>No image<?php endif; ?></td>
                <td><?= esc($product['name']) ?></td>
                <td><?= number_format((float) $product['price'], 2) ?></td>
                <td><?= esc($product['stock_quantity']) ?></td>
                <td class="row-actions">
                    <a href="<?= url_to('products.edit', $product['id']) ?>">Edit</a>
                    <form method="post" action="<?= url_to('products.delete', $product['id']) ?>" onsubmit="return confirm('Delete this product?');">
                        <?= csrf_field() ?><button class="link-button" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= view('_footer') ?>