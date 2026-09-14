<?= view('_header', ['title' => 'About | Peralta POS']) ?>
<p class="eyebrow">About</p>
<h1>A focused start for the counter.</h1>
<p class="intro">This first POS release covers the account views your team needs to begin organizing daily operations. Customer and staff records are currently sample data stored in PHP arrays.</p>
<div class="actions">
    <a class="button" href="<?= url_to('customers') ?>">Customer accounts</a>
    <a class="button secondary" href="<?= url_to('users') ?>">User accounts</a>
</div>
<?= view('_footer') ?>