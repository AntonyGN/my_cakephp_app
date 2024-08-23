<a href="<?= $this->Url->build(['action' => 'add']) ?>">Add User</a>

<table>
    <tr>
        <td>ID</td>
        <td>Username</td>
        <td>Password</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php foreach ($results as $row): ?>
        <tr>
            <td><?= h($row->id) ?></td>
            <td><?= h($row->username) ?></td>
            <td><?= h($row->password) ?></td>
            <td><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit', $row->id]) ?>">Edit</a></td>
            <td><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'delete', $row->id]) ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
