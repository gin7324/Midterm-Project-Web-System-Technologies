<?= view('_header', ['title' => $title]) ?>

<p class="eyebrow">Team Access</p>
<h1><?= esc($heading) ?></h1>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="panel">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= esc($action) ?>" method="post" enctype="multipart/form-data">

    <?= csrf_field() ?>

    <p>
        <label for="username">Username</label><br>
        <input
            type="text"
            id="username"
            name="username"
            vvalue="<?= old('username', $user['username'] ?? '') ?>"
            required
        >
    </p>

    <p>
        <label for="full_name">Full Name</label><br>
        <input
            type="text"
            id="full_name"
            name="full_name"
            value="<?= old('full_name', $user['full_name'] ?? '') ?>"
            required
        >
    </p>

    <p>
        <label for="password">
    Password <?= isset($user) ? '(leave blank to keep current password)' : '' ?>
</label>
        <input
    type="password"
    id="password"
    name="password"
    <?= isset($user) ? '' : 'required' ?>
>
    </p>

    <p>
        <label for="avatar">Avatar</label><br>
        <input
            type="file"
            id="avatar"
            name="avatar"
            accept=".jpg,.jpeg,.png"
        >
    </p>

    <p>
        <button type="submit">
    <?= isset($user) ? 'Update Staff' : 'Create Staff' ?>
</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </p>

</form>

<?= view('_footer') ?>