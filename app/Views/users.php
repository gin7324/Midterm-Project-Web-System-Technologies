<?= view('_header', ['title' => 'User Accounts | Peralta POS']) ?>

<p class="eyebrow">Team Access</p>

<h1>User accounts</h1>

<p class="intro">
    Manage staff accounts and access information.
</p>

<div class="actions">
    <a class="button" href="<?= url_to('users.new') ?>">Add staff</a>
</div>

<section class="panel" style="margin-top: 1.5rem;">
    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($users)): ?>

                <tr>
                    <td colspan="4">No staff accounts have been added yet.</td>
                </tr>

            <?php else: ?>

                <?php foreach ($users as $user): ?>

                    <tr>
                        <td>
                            <?php if (!empty($user['avatar'])): ?>

                                <img
                                    class="thumbnail"
                                    src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                                    alt="<?= esc($user['full_name']) ?>"
                                >

                            <?php else: ?>

                                <div
                                    style="
                                        width: 52px;
                                        height: 52px;
                                        border-radius: .25rem;
                                        background: #f2f4f7;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        color: #667085;
                                        font-size: .7rem;
                                        text-align: center;
                                    "
                                >
                                    No avatar
                                </div>

                            <?php endif; ?>
                        </td>

                        <td>
                            <?= esc($user['username']) ?>
                        </td>

                        <td>
                            <?= esc($user['full_name']) ?>
                        </td>

                        <td>
                            <div class="row-actions">

                                <a
                                    class="button secondary"
                                    href="<?= url_to('users.edit', $user['id']) ?>"
                                >
                                    Edit
                                </a>

                                <form
                                    action="<?= url_to('users.delete', $user['id']) ?>"
                                    method="post"
                                    onsubmit="return confirm('Delete this staff account?');"
                                >
                                    <?= csrf_field() ?>

                                    <button
                                        type="submit"
                                        class="link-button"
                                    >
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>

            <?php endif; ?>
        </tbody>
    </table>
</section>

<?= view('_footer') ?>