<?= view('_header', ['title' => 'Record Sale | Peralta POS']) ?>

<p class="eyebrow">New transaction</p>

<h1>Record sale</h1>

<p class="intro">
    Select a product, optionally select a customer,
    and enter the quantity sold.
</p>

<?php if (session()->getFlashdata('error')): ?>
    <div class="panel">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<section class="panel">

    <form action="<?= url_to('sales.create') ?>" method="post">

        <?= csrf_field() ?>

        <label for="product_id">Product</label>

        <select name="product_id" id="product_id" required>
            <option value="">Select a product</option>

            <?php foreach ($products as $product): ?>

                <option
                    value="<?= esc($product['id']) ?>"
                    <?= old('product_id') == $product['id']
                        ? 'selected'
                        : '' ?>
                >
                    <?= esc($product['name']) ?>
                    -
                    <?= number_format((float) $product['price'], 2) ?>
                    -
                    Stock:
                    <?= esc($product['stock_quantity']) ?>
                </option>

            <?php endforeach; ?>
        </select>

        <label for="customer_id">
            Customer (optional)
        </label>

        <select name="customer_id" id="customer_id">

            <option value="">
                No customer / Walk-in
            </option>

            <?php foreach ($customers as $customer): ?>

                <option
                    value="<?= esc($customer['id']) ?>"
                    <?= old('customer_id') == $customer['id']
                        ? 'selected'
                        : '' ?>
                >
                    <?= esc($customer['full_name']) ?>
                </option>

            <?php endforeach; ?>

        </select>

        <label for="quantity">
            Quantity
        </label>

        <input
            type="number"
            name="quantity"
            id="quantity"
            min="1"
            value="<?= esc(old('quantity', 1)) ?>"
            required
        >

        <button type="submit">
            Record Sale
        </button>

    </form>

</section>

<?= view('_footer') ?>
