<?= view('_header', ['title' => 'User Accounts | Peralta POS']) ?>
<p class="eyebrow">Team access</p>
<h1>User accounts</h1>
<p class="intro">A temporary directory of staff accounts and responsibilities.</p>
<section class="panel">
    <table>
        <thead><tr><th>Username</th><th>Full name</th><th>Role</th></tr></thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['role']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= view('_footer') ?>