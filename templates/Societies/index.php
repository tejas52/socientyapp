<h1>Societies</h1>

<?= $this->Html->link('Add New Society', ['action' => 'add'], ['class' => 'button float-right']) ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($societies as $society):
            ?>
<tr>
    <td><?= h($society->id) ?></td>
    <td><?= $this->Html->link($society->name, ['action' => 'getWingsBySocietyId', (int)$society->id]) ?>
</td>
        <td><?= h($society->address) ?></td>
        <td><?= h($society->created) ?>
    </td>

    <td>
<?= $this->Html->link(' View ', '/societies/view/' . $society->id) ?>
<?= $this->Html->link(' Edit ', '/societies/edit/' . $society->id) ?>
<?= $this->Form->postLink(
    'Delete',
    ['controller' => 'Societies', 'action' => 'delete', $society->id],
    [
        'confirm' => 'Are you sure you want to delete this society?',
        'class' => 'btn btn-danger'
    ]
) ?>


    </td>
</tr>
<?php endforeach; ?>

    </tbody>
</table>
