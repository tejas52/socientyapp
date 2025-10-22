<h1>Flats</h1>

<?= $this->Html->link('Add Flat', ['action' => 'add'], ['class' => 'button float-right']) ?>

<table>
    <tr>
        <th>ID</th>
        <th>Flat No</th>
        <th>Wing</th>
        <th>Society</th>
        <th>Owner</th>
        <th>Members</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($flats as $flat):
        ?>
    <tr>
        <td><?= h($flat->id) ?></td>
        <td><?= h($flat->flat_no) ?></td>
        <td><?= $flat->wing->name ?? '' ?></td>
        <td><?= $flat->wing->society->name ?? '' ?></td>
        <td><?= h($flat->owner_name) ?></td>
        <td><?= count($flat->members ?? []) ?></td>
        <td>
            <?= $this->Html->link('View', ['action' => 'view', $flat->id]) ?> |
            <?= $this->Html->link('Edit', ['action' => 'edit', $flat->id]) ?> |
            <?= $this->Form->postLink('Delete', ['action' => 'delete', $flat->id], ['confirm' => 'Are you sure?']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
