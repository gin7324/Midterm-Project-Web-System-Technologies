<?= view('_header', ['title' => 'Customers | Peralta POS']) ?>
<p class="eyebrow">Customer management</p>
<h1>Customers</h1>
<p class="intro">Create and maintain the customer records used by the POS.</p>
<?php if ($message = session()->getFlashdata('message')): ?><p class="notice"><?= esc($message) ?></p><?php endif; ?>
<div class="actions"><a class="button" href="<?= url_to('customers.new') ?>">Add customer</a></div>
<section class="panel">
    <table>
        <thead><tr><th>Full name</th><th>Email</th><th>Phone</th><th>Actions</th></tr></thead>
        <tbody>
        <?php if ($customers === []): ?><tr><td colspan="4">No customers have been added yet.</td></tr><?php endif; ?>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone'] ?? '') ?></td>
                <td class="row-actions">
                    <a href="<?= url_to('customers.edit', $customer['id']) ?>">Edit</a>
                    <form method="post" action="<?= url_to('customers.delete', $customer['id']) ?>" onsubmit="return confirm('Delete this customer?');">
                        <?= csrf_field() ?><button class="link-button" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= view('_footer') ?>