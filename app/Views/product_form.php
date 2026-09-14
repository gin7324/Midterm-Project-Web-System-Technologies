<?php $editing = $product !== null; ?>
<?= view('_header', ['title' => ($editing ? 'Edit product' : 'Add product') . ' | Peralta POS']) ?>
<p class="eyebrow">Inventory management</p>
<h1><?= $editing ? 'Edit product' : 'Add product' ?></h1>
<section class="panel form-panel">
    <?php if (session('errors')): ?><div class="error"><?= validation_list_errors() ?></div><?php endif; ?>
    <form method="post" enctype="multipart/form-data" action="<?= $editing ? url_to('products.update', $product['id']) : url_to('products.create') ?>">
        <?= csrf_field() ?>
        <label for="name">Name</label>
        <input id="name" name="name" value="<?= esc(old('name', $product['name'] ?? '')) ?>" maxlength="100" required>
        <label for="price">Price</label>
        <input id="price" name="price" type="number" step="0.01" min="0" value="<?= esc(old('price', $product['price'] ?? '')) ?>" required>
        <label for="stock_quantity">Stock quantity</label>
        <input id="stock_quantity" name="stock_quantity" type="number" min="0" value="<?= esc(old('stock_quantity', $product['stock_quantity'] ?? '0')) ?>" required>
        <label for="image">Product image</label>
        <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp">
        <p class="intro">JPEG, PNG, or WebP up to 2 MB.</p>
        <div class="actions"><button class="button" type="submit"><?= $editing ? 'Save changes' : 'Add product' ?></button><a class="button secondary" href="<?= url_to('products') ?>">Cancel</a></div>
    </form>
</section>
<?= view('_footer') ?>