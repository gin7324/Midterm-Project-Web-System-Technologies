<?= view('_header', ['title' => 'Peralta POS']) ?>
<p class="eyebrow">Point of Sale</p>
<h1>Keep every sale moving.</h1>
<p class="intro">Peralta POS gives your team a simple place to manage customer accounts and staff access while the system takes shape.</p>
<div class="actions">
    <a class="button" href="<?= url_to('customers') ?>">View customers</a>
    <a class="button secondary" href="<?= url_to('users') ?>">View users</a>
</div>
<?= view('_footer') ?>