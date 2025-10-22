<h1>Members</h1>
<?= $this->Html->link('Add Member', ['action' => 'add'], ['class' => 'button float-right']) ?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Society</th>
        <th>Wing</th>
        <th>Flat</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($members as $member): ?>
    <tr>
        <td><?= h($member->id) ?></td>
        <td><?= h($member->name) ?></td>
        <td><?= $member->society->name ?? '' ?></td>
        <td><?= $member->wing->name ?? '' ?></td>
        <td><?= $member->flat->flat_no ?? '' ?></td>
        <td><?= h($member->email) ?></td>
        <td><?= h($member->phone) ?></td>
        <td>
            <?= $this->Html->link('View', ['action' => 'view', $member->id]) ?> |
            <?= $this->Html->link('Edit', ['action' => 'edit', $member->id]) ?> |
            <?= $this->Form->postLink('Delete', ['action' => 'delete', $member->id], ['confirm' => 'Are you sure?']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
