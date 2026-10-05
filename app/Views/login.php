<?= view('_header', ['title' => $title]) ?>

<p class="eyebrow">Staff Access</p>
<h1>Staff Login</h1>
<p class="intro">Log in to access the POS management system.</p>

<?php if (session()->getFlashdata('error')): ?>
    <div class="panel">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="panel">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('login') ?>" method="post">

    <?= csrf_field() ?>

    <p>
        <label for="username">Username</label><br>
        <input
            type="text"
            id="username"
            name="username"
            value="<?= old('username') ?>"
            required
        >
    </p>

    <p>
        <label for="password">Password</label><br>
        <input
            type="password"
            id="password"
            name="password"
            required
        >
    </p>

    <p>
        <button type="submit">Log In</button>
    </p>

</form>

<?= view('_footer') ?>