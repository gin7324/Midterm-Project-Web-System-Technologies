<?php $editing = $customer !== null; ?>
<?= view('_header', ['title' => ($editing ? 'Edit customer' : 'Add customer') . ' | Peralta POS']) ?>
<p class="eyebrow">Customer management</p>
<h1><?= $editing ? 'Edit customer' : 'Add customer' ?></h1>
<section class="panel form-panel">
    <?php if (session('errors')): ?><div class="error"><?= validation_list_errors() ?></div><?php endif; ?>
    <form method="post" action="<?= $editing ? url_to('customers.update', $customer['id']) : url_to('customers.create') ?>">
        <?= csrf_field() ?>
        <label for="full_name">Full name</label>
        <input id="full_name" name="full_name" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" maxlength="100" required>
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" maxlength="100" required>
        <label for="phone">Phone</label>
        <input id="phone" name="phone" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>" maxlength="20">
        <div class="actions"><button class="button" type="submit"><?= $editing ? 'Save changes' : 'Add customer' ?></button><a class="button secondary" href="<?= url_to('customers') ?>">Cancel</a></div>
    </form>
</section>
<?= view('_footer') ?>