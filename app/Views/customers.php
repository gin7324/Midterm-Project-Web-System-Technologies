<?= view('_header', ['title' => 'Customer Accounts | Peralta POS']) ?>
<p class="eyebrow">Accounts</p>
<h1>Customer accounts</h1>
<p class="intro">A temporary customer directory for the POS team.</p>
<section class="panel">
    <table>
        <thead><tr><th>Full name</th><th>Email</th><th>Phone</th></tr></thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= view('_footer') ?>