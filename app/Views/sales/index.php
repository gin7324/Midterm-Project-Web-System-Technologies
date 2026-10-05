<?= view('_header', ['title' => 'Sales History | Peralta POS']) ?>

<p class="eyebrow">Transaction records</p>

<h1>Sales history</h1>

<p class="intro">
    Review completed transactions, including the product, customer,
    staff member, quantity, and total paid.
</p>

<?php if (session()->getFlashdata('success')): ?>
    <div class="panel">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="panel">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<p>
    <a href="<?= url_to('sales.new') ?>">Record a new sale</a>
</p>

<section class="panel">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Customer</th>
                <th>Staff member</th>
                <th>Quantity</th>
                <th>Total price</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($sales === []): ?>
                <tr>
                    <td colspan="6">
                        No sales have been recorded yet.
                    </td>
                </tr>
            <?php endif; ?>

            <?php foreach ($sales as $sale): ?>
                <tr>
                    <td><?= esc($sale['product_name']) ?></td>

                    <td>
                        <?= esc($sale['customer_name'] ?? 'None') ?>
                    </td>

                    <td>
                        <?= esc($sale['staff_name']) ?>
                    </td>

                    <td>
                        <?= esc($sale['quantity']) ?>
                    </td>

                    <td>
                        <?= number_format((float) $sale['total_price'], 2) ?>
                    </td>

                    <td>
                        <?= esc(
                            date(
                                'M j, Y g:i A',
                                strtotime($sale['created_at'])
                            )
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?= view('_footer') ?>
